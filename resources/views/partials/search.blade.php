 {{-- <form action="{{ route('products.search') }}" id="header_search_form">
      <div class="form-group mb-0 mr-1">
        <input type="text" name="q" class="form-control search_input" placeholder="Search Item" value="{{ request()->q ?? '' }}" required="required">
   </div>
  <button type="submit" class="header_search_button"><img src="images/search.png" alt=""></button>
 </form>  --}}

<div class="header_search">
    <form  action="{{ route('products.search') }}" id="header_search_form">
        
      <input type="text" name="q" class="form-control search_input" placeholder="Search Item"  value="{{ request()->q ?? '' }}" required="required">
      
      <button class="header_search_button"><img src="images/search.png" alt=""></button>
  
    </form>
</div> 

