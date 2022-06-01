<div class="card">
    <div class="card-header container">
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-6">
            <div class="col-span-2">
                <input wire:model="search" class="form-control" id="search" placeholder="{{__("Search")}}" type="text"">
                
            </div>
            <div class="col-span-2 grid grid-cols-2 gap-6">
                <div class="col-span-1 w-full h-full flex flex-col justify-center">
                    @can('usos-terminales.create')
                        <a href="{{route('usos-terminales.pdf')}}" class="btn btn-danger">{{__('Download')}} PDF <svg class="svg-inline--fa fa-file-pdf fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-pdf" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M181.9 256.1c-5-16-4.9-46.9-2-46.9 8.4 0 7.6 36.9 2 46.9zm-1.7 47.2c-7.7 20.2-17.3 43.3-28.4 62.7 18.3-7 39-17.2 62.9-21.9-12.7-9.6-24.9-23.4-34.5-40.8zM86.1 428.1c0 .8 13.2-5.4 34.9-40.2-6.7 6.3-29.1 24.5-34.9 40.2zM248 160h136v328c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V24C0 10.7 10.7 0 24 0h200v136c0 13.2 10.8 24 24 24zm-8 171.8c-20-12.2-33.3-29-42.7-53.8 4.5-18.5 11.6-46.6 6.2-64.2-4.7-29.4-42.4-26.5-47.8-6.8-5 18.3-.4 44.1 8.1 77-11.6 27.6-28.7 64.6-40.8 85.8-.1 0-.1.1-.2.1-27.1 13.9-73.6 44.5-54.5 68 5.6 6.9 16 10 21.5 10 17.9 0 35.7-18 61.1-61.8 25.8-8.5 54.1-19.1 79-23.2 21.7 11.8 47.1 19.5 64 19.5 29.2 0 31.2-32 19.7-43.4-13.9-13.6-54.3-9.7-73.6-7.2zM377 105L279 7c-4.5-4.5-10.6-7-17-7h-6v128h128v-6.1c0-6.3-2.5-12.4-7-16.9zm-74.1 255.3c4.1-2.7-2.5-11.9-42.8-9 37.1 15.8 42.8 9 42.8 9z"></path></svg></a>
                    @endcan
                </div>
                <div class="col-span-1 w-full h-full flex flex-col justify-center">
                    @can('usos-terminales.create')
                        <a class="btn btn-primary" href="{{route('usos-terminales.create')}}">{{__('Add Use Terminal')}}</a>
                    @endcan
                </div>
            </div>

        </div>
    </div>
    @if ($usos_terminales->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            <a href="{{route('usos-terminales.index',['condicional'=>'id','orden'=>isset($_SESSION["orden"]) ? $_SESSION['orden'] : 'ASC'])}}" class="text-black flex">
                                ID
                                <?php
                                    if (isset($_SESSION["condicional"])) {
                                        if ($_SESSION['condicional']=='id') {
                                            if (isset($_SESSION["orden"])) {
                                                if ($_SESSION['orden']=='ASC') {
                                                    ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"  style="width: 20px; height: 20px;"><path d="M288.662 352H31.338c-17.818 0-26.741-21.543-14.142-34.142l128.662-128.662c7.81-7.81 20.474-7.81 28.284 0l128.662 128.662c12.6 12.599 3.676 34.142-14.142 34.142z"/></svg>
                                                        
                                                    <?php
                                                }else{
                                                    ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"  style="width: 20px; height: 20px;"><path d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"/></svg>
                                                    <?php
                                                }
                                            }else {
                                                ?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"  style="width: 20px; height: 20px;"><path d="M288.662 352H31.338c-17.818 0-26.741-21.543-14.142-34.142l128.662-128.662c7.81-7.81 20.474-7.81 28.284 0l128.662 128.662c12.6 12.599 3.676 34.142-14.142 34.142z"/></svg>
                                                <?php
                                            }
                                        }
                                    }
                                ?>
                            </a>
                        </th>
                        <th>{{__('Terminal')}}</th>
                        <th>{{__('Persona')}}</th>                    
                        <th>{{__('SIM')}}</th>
                        <th>
                            <a href="{{route('usos-terminales.index',['condicional'=>'en_uso','orden'=>isset($_SESSION["orden"]) ? $_SESSION['orden'] : 'ASC'])}}" class="text-black flex">
                                {{__('In use')}}
                                <?php
                                    if (isset($_SESSION["condicional"])) {
                                        if ($_SESSION['condicional']=='en_uso') {
                                            if (isset($_SESSION["orden"])) {
                                                if ($_SESSION['orden']=='ASC') {
                                                    ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"  style="width: 20px; height: 20px;"><path d="M288.662 352H31.338c-17.818 0-26.741-21.543-14.142-34.142l128.662-128.662c7.81-7.81 20.474-7.81 28.284 0l128.662 128.662c12.6 12.599 3.676 34.142-14.142 34.142z"/></svg>
                                                        
                                                    <?php
                                                }else{
                                                    ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"  style="width: 20px; height: 20px;"><path d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"/></svg>
                                                    <?php
                                                }
                                            }else {
                                                ?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"  style="width: 20px; height: 20px;"><path d="M288.662 352H31.338c-17.818 0-26.741-21.543-14.142-34.142l128.662-128.662c7.81-7.81 20.474-7.81 28.284 0l128.662 128.662c12.6 12.599 3.676 34.142-14.142 34.142z"/></svg>
                                                <?php
                                            }
                                        }
                                    }
                                ?>
                            </a>
                        </th>
                        <th colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usos_terminales as $usos_terminale)
                        <tr>
                            <td>{{$usos_terminale->id}}</td>
                            <td>{{$usos_terminale->terminal->id.'.-'.$usos_terminale->terminal->modelo_terminal->marca_terminal->name.' /-/ '.$usos_terminale->terminal->modelo_terminal->modelo.' /-/ '.$usos_terminale->terminal->imei_1}}</td>
                            <td>{{$usos_terminale->persona->id.'.-'.$usos_terminale->persona->name.' /-/ '.$usos_terminale->persona->dni}}</td>
                            <td>{{$usos_terminale->sim->id.'.-'.$usos_terminale->sim->numero_sim}}</td>
                            <td>{{$usos_terminale->en_uso == 1 ? 'Si' : 'No'}}</td>
                            <td>
                                @can('usos-terminales.show')
                                    <a class="btn-success btn" href="{{route('usos-terminales.show',$usos_terminale)}}">{{__('Show')}}</a>    
                                @endcan
                            </td>
                            <td>
                                @can('usos-terminales.edit')
                                    <a class="btn-primary btn" href="{{route('usos-terminales.edit',$usos_terminale)}}">{{__('Edit')}}</a>    
                                @endcan
                            </td>
                            <td>
                                @can('usos-terminales.destroy')
                                <form action="{{route('usos-terminales.destroy',compact('usos_terminale'))}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn">{{__('Delete')}}</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$usos_terminales->links()}}
        </div>
    

    @else
        <div class="card-body">
            <strong>{{__('There is no record')}}</strong>
        </div>
    @endif
</div>
