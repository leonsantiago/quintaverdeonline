<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img  src="/image/slider.png" class="img-​thumbnail mx-auto d-block" alt="..." style="height: 150px !important; width: 90vh !important">
    </div>
    @foreach ($promotions as $promotion)
      <div class="carousel-item">
        <img src="/image/promotions/{{ $promotion->image }}" alt="{{ $promotion->name }}" class="img-​thumbnail mx-auto d-block" alt="..." style="height: 150px !important; width: 90vh !important">
      </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
  </button>
</div>