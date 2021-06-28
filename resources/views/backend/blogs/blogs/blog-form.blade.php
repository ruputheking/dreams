<div class="row">
    <div class="col-xs-12">
        <div class="basic-form">
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <h4>Title <span class="required">*</span></h4>
                {!! Form::text('title', null, ['class' => 'form-control border-none input-default bg-ash', 'placeholder' => 'Enter News Title', 'id' => 'title']) !!}
            </div>
            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                <h4>Slug <span class="required">*</span></h4>
                {!! Form::text('slug', null, ['class' => 'form-control border-none input-default bg-ash', 'id' => 'slug']) !!}
            </div>
            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                <h4>Category <span class="required">*</span></h4>
                {!! Form::select('category_id', App\Models\Category::pluck('title', 'id'), null, ['class' => 'form-control border-none input-default bg-ash select2', 'placeholder' => 'Choose Category']) !!}
            </div>
            <div class="form-group {{ $errors->has('summary') ? 'has-error' : '' }}">
                <h4>Summary <span class="required">*</span></h4>
                {!! Form::textarea('summary', null, ['class' => 'form-control border-none input-default bg-ash', 'style' => 'height:100px;']) !!}
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <h4>Description <span class="required">*</span></h4>
                {!! Form::textarea('description', null, ['class' => 'form-control border-none input-default bg-ash textarea']) !!}
            </div>
            <div class="form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">
                <h4>Published Date</h4>
                <div class='input-group date' id='datetimepicker5'>
                    {!! Form::text('published_at', $post->exists ? null : date("Y-m-d H:i:s"), ['class' => 'form-control border-none input-default bg-ash', 'placeholder' => 'Y-m-d H:i:s']) !!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

            <div class="basic-form">
                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                    <h4>Image <span class="required">*</span></h4>
                    @if ($post->exists)
                    <input type="text" id="result" class="form-control border-none input-default bg-ash" style="width:100%;" name="image" value="{{ $post->image->image_url }}" />
                    @else
                    <input type="text" id="result" class="form-control border-none input-default bg-ash" style="width:100%;" name="image" />
                    @endif
                    <div class="clearfix">
                        <button class="btn btn-primary pull-right" type="button" onclick="document.getElementById('id01').style.display='block'" style="margin-top:10px;">Gallery</button>
                    </div>
                </div>
            </div>

            @include('backend.partial.popup')

            <div class="card-header" style="border-bottom:1px solid #ccc;" id="headingTwo">
                <h4 class="mb-0">
                    <span style="cursor:pointer;" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        SEO Details  <i class="fa fa-arrow-down"></i>
                    </span>
                </h4>
            </div>
            <div id="collapseTwo" class="collapse mb-4" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="col-md-12 {{ $errors->has('seo_meta_keywords') ? ' has-error' : '' }}">
                    <label class="control-label">Meta Keywords</label>
                    <textarea type="text" class="form-control" name="seo_meta_keywords" value="{{ old('seo_meta_keywords') }}" placeholder="Meta Keywords"></textarea>
                </div>
                <div class="col-md-12 {{ $errors->has('seo_meta_description') ? ' has-error' : '' }}">
                    <label class="control-label">Meta Description</label>
                    <textarea type="text" class="form-control" name="seo_meta_description" value="{{ old('seo_meta_description') }}" placeholder="Meta Description"></textarea>
                </div>
            </div>
            <div class="box-footer pull-right mt-4">
                @if ($post->exists)
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('blogs.index') }}" class="btn btn-default">Cancel</a>
                @else
                <a id="draft-btn" class="btn btn-default">Save Draft</a>
                {!! Form::submit('Publish', ['class' => 'btn btn-success']) !!}
                @endif
            </div>
        </div>
    </div>
</div>