@extends('layouts.empty')

@section('title', 'Пример страницы для получения информации о видео')

@section('content')
  
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">  
        <form action="/api/video/" method="GET" v-on:submit.prevent="onSubmit">
          <div class="form-group">
              <label class="col-form-label" for="sourceCode">Код для вставки видео</label>
              <textarea class="form-control" id="sourceCode" v-model="sourceCode"  aria-describedby="sourceCodeHelp" rows="3" placeholder="Введите url или html код видео"></textarea>
              <small id="sourceCodeHelp" class="form-text text-muted"></small>
          </div>
          <div class="form-group row">
            <div class="col-md-9 col-md-offset-3">
                <button type="submit" class="btn btn-primary">Распознать</button>
            </div>
          </div>
        </form>
         <div class="form-group">
              <label class="col-form-label" for="videoInfo">Результат</label>
              <textarea class="form-control" id="videoInfo" aria-describedby="videoInfoHelp" v-model="videoInfo" rows="15" readonly></textarea>
              <small id="videoInfoHelp" class="form-text text-muted"></small>
          </div>
        </div>
      </div>
  </div>
    
@endsection