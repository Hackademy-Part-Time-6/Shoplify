<?php

namespace App\Http\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionRemoveFaces;
use App\Jobs\GoogleVisionSafeSearchImage;
use App\Models\Ad;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Jobs\ResizeImage;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\File;

class CreateAd extends Component
{
    use WithFileUploads;
    public $title;
    public $body;
    public $price;
    public $category;

    public $images = [];
    public $temporary_images;
    public $image;

    protected $rules = [
        'title' =>'required|min:4',
        'category'=>'required',
        'body'=>'required|min:8',
        'price'=>'required|numeric',
    ];
        protected $messages = [
        
        'required'=>'Field :attribute is required, please fill it',
        'min'=>'Field :attribute should be longer than :min',
        'numeric'=>'Field :attribute must be a number',
        'temporary_images.required' => 'La imagen es obligatoria',
        'temporary_images.*.image' => 'Los archivos tienen que ser imagenes',
        'temporary_images.*.max' => 'La imagen supera los :max mb',
        'images.image' => 'El archivo tiene que ser una imagen',
        'images.max' => 'La imagen supera los :max mb'
    ];


    
    
public function store()
{
    // datos validados
    $validatedData = $this->validate();
    // busco la categoria
    $category = Category::find($this->category);
    
    // creo el anuncio a partir de la categoria usando la relacion y pasando los datos validados
    $ad = $category->ads()->create($validatedData);
    
    // vuelvo a guardar el anuncio "pasando" por la relacion del usuario
    Auth::user()->ads()->save($ad);
    // guardo cada imagen en el db y en el storage
    if(count($this->images)){
        $newFileName = "ads/$ad->id";
        foreach ($this->images as $image) {
            $newImage = $ad->images()->create([
                'path'=>$image->store($newFileName,'public')
            ]);
            Bus::chain([
                new GoogleVisionRemoveFaces($newImage->id),
                new ResizeImage($newImage->path,400,400),
                new GoogleVisionSafeSearchImage($newImage->id),
                new GoogleVisionLabelImage($newImage->id)
            ])->dispatch();
        }
        
        File::deleteDirectory(storage_path('/app/livewire-tmp'));
    }
    
    session()->flash('message', 'Anuncio creado correctamente');
    $this->cleanForm();
}

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }


    public function cleanForm () {
        $this->title ="";
        $this->category ="";
        $this->body ="";
        $this->price ="";
        $this->images = [];
    }

    public function render()
    {
        return view('livewire.create-ad');
    }

    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*'=>'image|max:2048'
        ])){
            foreach ($this-> temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }
    public function removeImage($key)
    {
        if(in_array($key,array_keys($this->images))){
            unset($this->images[$key]);
        }
    }
}
