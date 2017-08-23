<div class="wrapper container-fluid">
    {!!
      Form::open([
      'url'=>route('pagesAdd'),
      'class'=>'form-horizontal',
      ',method'=>'POST',
      'enctype'=>'multipart/form-data'])
      !!}
    <div class="form-group">
        {!! Form::label('name','Название',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Введите название страницы']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('alias','Псевдоним',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('alias',old('alias'),['class'=>'form-control','placeholder'=>'Введите псевдоним страницы']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('text','Текст',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text',old('text'),['name'=>'text','id'=>'text','class'=>'form-control','placeholder'=>'Введите текст страницы']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('img','Изображение',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('img',old('img'),['class'=>'filestyle','data-buttonText'=>'Выберите изображение','data-buttonName'=>'btn-primary','data-placeholder'=>'Файла нет','placeholder'=>'Загрузите изображение страницы']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10 ">
            {!! Form::button('Сохранить',['class'=>'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>
    {!! Form::close() !!}
    <script>
        $('#text').trumbowyg();
    </script>
</div>