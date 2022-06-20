
<div class="search-menu col-md-5 ml-auto">
    <form action="{{route('show.search')}}" class="input-group" method="get">
        {{--{{csrf_field()}}--}}
        <input id="keyUpsr" type="text" class="form-control mr-auto" name="search_product"  placeholder="Tìm kiếm" >
        <span class="input-group-addon" ><button style="cursor: pointer" type="submit"><i class="fa fa-search"></i></button></span>
    </form>
        <div class="container-fluid text-white kh">
           <div class="row">
              <div class="col-12">
                  <div class="producr_List">
                  </div>
              </div>
           </div>
        </div>

</div>
