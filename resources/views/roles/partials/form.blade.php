<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <h5><strong>{!! Form::label('name', __('Name')) !!}</strong></h5>
    {!! Form::text('name', null, ['class' => 'form-control','placeholder' => __('Enter role name')]) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>

<div class="form-group">
    <h5><strong>{!! Form::label('permissions', __('Permissions')) !!}</strong></h5>
    
    @foreach ($permissions as $permission)
            <?php
                $res=$permission->name;
                if (strpos($res,".")){
                    $y=(strpos($res,"."));
                    $res=substr($res,0,$y);
                    
                }
                if (isset($resX)) {
                    if ($res!=$resX) {
                        echo "<h5>".__(ucfirst($res)).":</h5>";
                    }
                }else{
                    echo "<h5>".__(ucfirst($res)).":</h5>";
                }
                $resX=$res;
            ?>
        <div class="checkbox{{ $errors->has('permissions[]') ? ' has-error' : '' }}">
            <label class="ml-4">
                {!! Form::checkbox('permissions[]', $permission->id, null,['class'=>'mr-1']) !!} 
                {{__($permission->description)}}
            </label>
        </div>
        <small class="text-danger">{{ $errors->first('permissions') }}</small>
    @endforeach
</div>