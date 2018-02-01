@php
	$fieldValue = (isset($fieldValue) ? $fieldValue : '' );	
@endphp
<div class="col {{$cols}}" >
	<div class="form-group">
		<label>{{$label}}</label>
		<input class="form-control" name="{{$name}}" placeholder="{{$placeHolder}}" value="{{$fieldValue}}" {{$readOnly == 'true' ? 'readonly' : ''}}>
	</div>		
</div>