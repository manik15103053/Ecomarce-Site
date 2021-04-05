
  <div class="list-group">
    @foreach (App\Models\Category::orderBy('id','asc')
    ->where('parent_id',NULL)->get()  as $parent)
    <a href="{{route('category.show',$parent->id)}}"class="list-group-item list-group-item-action
      
        @if(Route::is('category.show'))

          @if($parent->id == $category->id)

          active
          
          @endif
        
        @endif


      "data-toggle="collapse">
      <img src="{{asset('images/categories/'.$parent->image)}}"width="50" alt="">
      
      {{$parent->name}}</a>
      <div class="collapse"id="main-{{$parent->id}}">
        @foreach (App\Models\Category::orderBy('id','asc')
                    ->where('parent_id',$parent->id)->get()  as $child)
       
       <a href="#main-{{$parent->id}}"class="list-group-item list-group-item-action" >
        <img src="{{asset('images/categories/'.$child->image)}}"width="50" alt="">
        
        {{$child->name}}</a>
        @endforeach

      </div>
     

    
        
    @endforeach
 
    </div>
  
   