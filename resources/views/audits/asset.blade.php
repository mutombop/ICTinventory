@extends('layouts.app')

@section('content')
<br/>
<h4>Audit trail for asset: {{$asset->inventorytag}} ({{$asset->assetmodel->modelname}}, S/N: {{$asset->serialnumber}})</h4>

<ul>
        @forelse ($audits as $audit)
        <li>
            @lang('article.updated.metadata', $audit->getMetadata())

            @foreach ($audit->getModified() as $attribute => $modified)
            <ul>
                <li>@lang('article.'.$audit->event.'.modified.'.$attribute, $modified)</li>
            </ul>
            @endforeach
        </li>
        @empty
        <p>@lang('article.unavailable_audits')</p>
        @endforelse
    </ul>
    <br/>
    <hr>
    <br/>
    <a href="/assets" class="btn btn-primary">Go back</a>
@endsection
