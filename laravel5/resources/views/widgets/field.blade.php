@php
	$fieldValue = (isset($fieldValue) ? $fieldValue : '' );	
@endphp
<div class="col {{$cols}}" >
	@if(isset($label))	
		<div class="form-group">
			{{Form::label($label)}}	
			{{Form::text($name, $fieldValue, ['class'=>'form-control', 'placeholder'=>$placeHolder, $readOnly])}}
		</div>		
	@else
		{{Form::text($name, $fieldValue, ['class'=>'form-control', 'placeholder'=>$placeHolder, $readOnly])}}
	@endif	
</div>