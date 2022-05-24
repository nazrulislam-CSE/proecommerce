
@php
  $tags_en = App\Models\Product::groupBy('product_tags')->select('product_tags')->get();
@endphp 
<div class="sidebar-widget product-tag wow fadeInUp">
  <h3 class="section-title">Product tags</h3>
  <div class="sidebar-widget-body outer-top-xs">
    <div class="tag-list">
      @foreach($tags_en as $tag)
        <a class="item" title="Phone" href="{{ url('product-tag/'.$tag->product_tags) }}">
        {{ str_replace(',',' ',$tag->product_tags)  }}</a> 
      @endforeach
      <a class="item" title="Smartphone" href="#">Smartphone</a>
      <a class="item" title="Rose" href="#">Rose</a> </div>
    <!-- /.tag-list --> 
  </div>
  <!-- /.sidebar-widget-body --> 
</div>