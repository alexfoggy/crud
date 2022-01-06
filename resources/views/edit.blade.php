@extends('app')
@section('title','Редактироване категории:--'.$currentCategory->name)
@section('content')

<a href='{{url('/')}}'>Создать категорию</a>
<main>
  <div class="py-5 text-center">
    @if(session('status'))
    <p class="text-danger">{{session('status')}}</p>
    @endif
  </div>
  <div class="row g-5">
    <div class="col-md-5 col-lg-4 order-md-last">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-primary">Категории товаров</span>
        <span class="badge bg-primary rounded-pill"></span>
      </h4>
      <ul class="list-group mb-3">
        {{generateCategories($category)}}
      </ul>
    </div>
    <div class="col-md-7 col-lg-8">
      <h4 class="mb-3">Редактирование категории <span class='text-danger'> {{$currentCategory->name}} </span></h4>
      <form class="needs-validation" novalidate action='{{url('categoryCreate')}}' method="POST">
      @csrf
      <input type="hidden" class="form-control" id="id" name='id' value='{{$currentCategory->id}}' required>
      <div class="row g-3">
        <div class="col-sm-6">
          <label for="name" class="form-label">Название</label>
          <input type="text" class="form-control" id="name" name='name' value='{{$currentCategory->name}}' required>
        </div>
        <div class="col-sm-6">
          <label for="parent" class="form-label">Родитель</label>
          <select class="form-select" name='parent' id="parent" required>
            <option value="0">Первый уровень</option>
            @foreach ($categoryAll as $categoryItem)
            <option value="{{$categoryItem->id}}" @if($currentCategory->p_id == $categoryItem->id) selected @endif>{{$categoryItem->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-sm-6">
          <label for="alias" class="form-label">Руотинг</label>
          <input type="text" class="form-control" id="alias" name='alias' value='{{$currentCategory->alias}}' required>
        </div>
        <div class="col-sm-4 pt-4 d-flex align-items-center pl-5">
          <input type="checkbox" class="form-check-input" id="active" name='active' @if($currentCategory->active == 1) checked @endif>
          <label class="form-check-label px-2" for="active">Активный</label>
        </div>
      </div>
      <hr class="my-4">
      <button class="w-100 mb-2 btn btn-primary btn-lg" type="submit">Добавить категорию</button>
      </form>
      <form action='{{url('categoryDelete',$currentCategory->alias)}}' method="POST">
      @csrf
      <button type="submit" style="border:0;background-color:#bd2130;color:#fff;" class="d-flex px-3 py-2 justify-content-center align-items-center">Удалить категорию</button>
      </form>
    </div>
  </div>
</main>
@stop

