@extends('app')
@section('content')


<main>
    <div class="py-5 text-center">

    </div>

    <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Категории товаров</span>
                <span class="badge bg-primary rounded-pill"></span>
            </h4>
            <ul class="list-group mb-3">
                @foreach ($category as $categoryItem)
                <li class="list-group-item d-flex justify-content-between lh-sm">
                        <a href="{{url('categoryEdit',$categoryItem->alias)}}" class="text-decoration-none @if($categoryItem->id === $currentCategory->id) text-warning @else text-dark  @endif">
                            <h6 class="my-0">{{$categoryItem->name}}</h6>
                            {{-- <small class="text-muted">Brief description</small> --}}
                        </a>
                        <span class="text-muted">{{$categoryItem->p_id}}</span>
                        <form action='{{url('categoryDelete',$categoryItem->alias)}}' method="POST" style='position: absolute;left:calc(100% + 10px);cursor: pointer;'>
                            @csrf
                            <button type="submit" style="border:0;width: 20px;height:20px;background-color:#bd2130;color:#fff;border-radius:50%;" class="d-flex justify-content-center align-items-center">-</button>
                        </form>
                    </li>
                @endforeach


            </ul>


        </div>
        <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Редактирование категории {{$currentCategory->name}}</h4>
            <form class="needs-validation" novalidate action='{{url('categoryCreate')}}' method="POST">
                @csrf
                <input type="hidden" class="form-control" id="id" name='id' value='{{$currentCategory->id}}' required>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="name" class="form-label">Название</label>
                        <input type="text" class="form-control" id="name" name='name' value='{{$currentCategory->name}}' required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="parent" class="form-label">Родитель</label>
                        <select class="form-select" name='parent' id="parent" required>
                            <option value="0">Первый уровень</option>
                            @foreach ($category as $categoryItem)
                            <option value="{{$categoryItem->id}}" @if($currentCategory->p_id == $categoryItem->id) selected @endif>{{$categoryItem->name}}</option>
                            @endforeach
 
                        </select>
                        <div class="invalid-feedback"> 
                            Valid last name is required.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="alias" class="form-label">Руотинг</label>
                        <input type="text" class="form-control" id="alias" name='alias' value='{{$currentCategory->alias}}' required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-sm-4 pt-4 d-flex align-items-center pl-5">
                        <input type="checkbox" class="form-check-input" id="active" name='active' @if($currentCategory->active == 1) checked @endif>
                        <label class="form-check-label px-2" for="active">Активный</label>
                    </div>

                </div>



                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" type="submit">Добавить категорию</button>
            </form>
        </div>
    </div>
</main>









@stop
