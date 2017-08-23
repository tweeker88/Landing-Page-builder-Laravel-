<div >
    <table class="table table-hover">
        <th>№</th>
        <th>Имя</th>
        <th>Псевдоним</th>
        <th>Текст</th>
        <th>Дата создания</th>
        <th>Удалить</th>
        @foreach($pages as $key=>$page)
            <tr>
                <td>{!!$page->id!!}</td>
                <td>{!! Html::link(route('pagesEdit',['page'=>$page->id]),$page->name) !!}</td>
                <td>{!! $page->alias!!}</td>
                <td>{{$page->text}}</td>
                <td>{!!$page->created_at!!}</td>

                <td>{!! Form::open(['url'=>route('pagesEdit',['page'=>$page->id]),'class'=>'form-horizontal','method'=>'POST']) !!}

                    {{ method_field('DELETE') }}
                    {!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}

                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
    <a class="btn btn-success" href="{{ route('pagesAdd','Новая страница') }}">Добавить страницу</a>
</div>
