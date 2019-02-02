<div id="breadcrumbs">
    <ol class="d-none d-md-flex breadcrumb" style="margin-bottom: 1px !important;">
        <?php
        $i = 1;
        $len = count($data);
        ?>
        @foreach($data as $bread)
            @if( !empty($bread['route']) )
                <li class="breadcrumb-item">
                    <a href="{{ route($bread['route']) }}">{{ $bread['name'] }}</a>
                </li>
            @else
                <li class="breadcrumb-item">
                    {{ $bread['name'] }}
                </li>
            @endif

            @if($i < $len) <span style="margin-left: 5px; margin-right: 5px"> /</span> @endif

            <?php $i++; ?>
        @endforeach
    </ol>

    @if($show_add_button)
        <div class="buttons">
            <a href="{{ $add_button_route }}" class="ui button primary"><i class="fa fa-plus"></i> Agregar</a>
        </div>
    @endif
</div>
