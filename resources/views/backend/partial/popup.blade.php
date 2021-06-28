@php
$i = 1;
$j = 1;
$k = 1;
$l = 1;
$m = 1;
@endphp

<div class="" style="margin:0 auto;">
    <div class="modal1 animate" id="id01">
        <div class="col-md-12 modal_menu">
            <div class="sticky" style="display:inline-flex;width:100%;">
                @foreach (get_folder() as $folder)
                <button type="button" class="tablink" onclick="openPage('{{$folder->folder}}', this, 'orange')" @if($folder->id == 1) id="defaultOpen" @endif>{{$folder->folder}}</button>
                @endforeach
            </div>

            @foreach (get_folder() as $folder)
            <div id="{{$folder->folder}}" class="tabcontainer">
                @foreach (\App\Models\Folder::find($folder->id)->images as $image)
                <div class="member">
                    <div class="member-pic1" data-setbg="{{$image->image_url }}" style="margin:6px;">
                        <input type="radio" name="radio" id="myCheckbox{{$i++}}" src="{{$image->image_url }}" onclick="getName{{$j++}}()" />
                        <label for="myCheckbox{{$m++}}">
                            <img class="member-pic1" src="{{$image->image_url }}" alt="" style="padding:0;">
                        </label>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach

        </div>
        <div class="" style="display:inline-block;">
            <div class="addbutton1">
                <button type="button" onclick="document.getElementById('id02').style.display='block'">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
            <div class="addbutton2">
                <button type="button" onclick="document.getElementById('id01').style.display='none'">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <div class="addbutton3">
                <button type="button" onclick="document.getElementById('id01').style.display='none'">
                    <i class="fa fa-check"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
@foreach (get_folder() as $folder)
    @foreach (App\Models\Folder::find($folder->id)->images as $image)
      function getName{{$k++}}() {
        document.getElementById("result").value = document.getElementById("myCheckbox{{$l++}}").src;
      }
    @endforeach
@endforeach
  function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontainer");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;
  }

  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
</script>

<div class="modal_container">
    <div class="modal2" id="id02">
        <div class="modal_content animate">
            <div class="modal2_title">Add New Photo</div>
            <div class="modal2_body">
                <div class="col-md-12 modal2_footer">
                    <h4>{!! Form::label('Image') !!}</h4>
                    <input type="file" name="image1" id="input-file-now" class="dropify" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" />
                </div>
                <div class="col-md-12">
                    <div class="basic-form">
                        <div class="form-group {{ $errors->has('image_name') ? 'has-error' : '' }}">
                            <h4>{!! Form::label('Image Name') !!}</h4>
                            {!! Form::text('image_name', null, ['class' => 'form-control border-none input-default bg-ash', 'placeholder' => 'Image Name']) !!}
                            @if ($errors->has('image_name'))
                            <span class="help-block">
                                {{ $errors->first('image_name') }}
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="basic-form">
                        <div class="form-group {{ $errors->has('folder_id') ? 'has-error' : '' }}">
                            <h4>{!! Form::label('Folder') !!}</h4>
                            {!! Form::select('folder_id', App\Models\Folder::pluck('title', 'id'), null, ['class' => 'form-control border-none input-default bg-ash']) !!}
                            @if ($errors->has('folder_id'))
                            <span class="help-block">
                                {{ $errors->first('folder_id') }}
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12 modal2_footer">
                    <div class="basic-form">
                        <div class="card-footer clearfix">
                            <button type="button" class="btn btn-primary" onclick="document.getElementById('id02').style.display='none'">Save</button>
                            <button type="button" class="btn btn-default" onclick="document.getElementById('id02').style.display='none'">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
