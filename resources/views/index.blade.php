@extends('app')

@section('title','Создание категорий')

@section('content')


<main>
    <div class="py-5 text-center">
        @if(session('status'))
            <p class="text-success">Категория была удаленна </p>
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
            <h4 class="mb-3">Создание категории</h4>
            <form class="needs-validation" action='{{url('categoryCreate')}}' method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Название</label>
                        <input type="text" class="form-control" id="name" name='name' required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="parent" class="form-label">Родитель</label>
                        <select class="form-select" name='parent' id="parent" required>
                            <option value="0">Первый уровень</option>
                            @foreach ($categoryAll as $categoryItem)
                            <option value="{{$categoryItem->id}}">{{$categoryItem->name}}</option>
                            @endforeach

                        </select>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="alias" class="form-label">Руотинг</label>
                        <input type="text" class="form-control" id="alias" name='alias' required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-sm-4 pt-4 d-flex align-items-center pl-5">
                        <input type="checkbox" class="form-check-input" id="active" name='active'>
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
