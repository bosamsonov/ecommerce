@extends('crewing.modules.page.page')

@section('content')

<h1>Кандидаты</h1>
<a href="{{route('crewing.candidates.create')}}" class="btn btn-primary">Добавить кандидата</a>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>
                    Surname
                </th>
                <th>
                    First Name
                </th>
                <th>
                    Rank
                </th>
                <th>
                    Nationality
                </th>
                <th>
                    DOB
                </th>
                <th>
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($candidates as $candidate)
                <tr>
                    <td>{{ $candidate->surname}}</td>
                    <td>{{ $candidate->first_name}}</td>
                    <td>{{ $candidate->rank}}</td>
                    <td>{{ $candidate->nationality}}</td>
                    <td>{{ $candidate->dob}}</td>
                    <td>
                        <a href="{{route('crewing.candidates.show', $candidate)}}">Просмотр</a>
                        <a href="{{route('crewing.candidates.edit', $candidate)}}">Редактировать</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


{{ $candidates->links() }}

@endsection