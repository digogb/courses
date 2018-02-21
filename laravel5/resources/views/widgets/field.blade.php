@php
	$fieldValue = (isset($fieldValue) ? $fieldValue : '' );	
@endphp
<div class="col {{$cols}}" >
	@if(isset($label))	
		<div class="form-group">	
			<label>{{$label}}</label>
			<input class="form-control" name="{{$name}}" placeholder="{{$placeHolder}}" value="{{$fieldValue}}" {{$readOnly}}>
		</div>		
	@else
		<input class="form-control" name="{{$name}}" placeholder="{{$placeHolder}}" value="{{$fieldValue}}" {{$readOnly}}>
	@endif	
</div>