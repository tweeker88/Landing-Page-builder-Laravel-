<div class="wrapper container-fluid">
    {!!
      Form::open([
      'url'=>route('pagesEdit',array('pages'=>$data['id'])),
      'class'=>'form-horizontal',
      'method'=>'POST',
      'enctype'=>'multipart/form-data'])
      !!}
    <div class="form-group">
        {!! Form::hidden('id',$data['id']) !!}
        {!! Form::label('name','Название',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('name',$data['name'],['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('alias','Псевдоним',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('alias',$data['alias'],['class'=>'form-control','placeholder'=>'Введите псевдоним страницы']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('text','Текст',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text',$data['text'],['name'=>'text','id'=>'text','class'=>'form-control','placeholder'=>'Введите текст страницы']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('old_img','Изображение',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Html::image('/img/'.$data['img'],'',['class'=>'']) !!}
            {!! Form::hidden('old_img',$data['img']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('img','Изображение',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('img',['class'=>'filestyle','data-buttonText'=>'Выберите изображение','data-buttonName'=>'btn-primary','data-placeholder'=>'Файла нет','placeholder'=>'Загрузите изображение страницы']) !!}
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