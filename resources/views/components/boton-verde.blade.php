@props(['href' => '#'])
@props(['type' => 'button'])

@if($type === 'submit')
    <button type="submit" {{ $attributes->merge(['class' => 'btn btn-verde']) }}>
        {{ $slot }}
    </button>
@else
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'btn btn-verde']) }}>
        {{ $slot }}
    </a>
@endif

<style>
.btn-verde {
	color: #ffffff;
	text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
	background-color: #5bb75b;
	background-image: -moz-linear-gradient(top, #62c462, #51a351);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#62c462), to(#51a351));
	background-image: -webkit-linear-gradient(top, #62c462, #51a351);
	background-image: -o-linear-gradient(top, #62c462, #51a351);
	background-image: linear-gradient(to bottom, #62c462, #51a351);
	background-repeat: repeat-x;
	border-color: #51a351 #51a351 #387038;
	border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
}
.btn {
	display: inline-block;
	padding: 4px 12px;
	margin-bottom: 0;
	font-size: 13px;
	line-height: 16px;
	text-align: center;
	vertical-align: middle;
	cursor: pointer;
	border-radius: 4px;
    border: 1px solid transparent;
	box-shadow: inset 0 1px 0 rgba(255, 255, 255, .2), 0 1px 2px rgba(0, 0, 0, .05);
}

.btn-verde:hover,
.btn-verde:focus,
.btn-verde:active,
.btn-verde.active,
.btn-verde.disabled,
.btn-verde[disabled] {
	color: #ffffff;
	background-color: #51a351;
}

.btn:hover, .btn:focus {
	text-decoration: none;
	background-position: 0 -15px;
	-webkit-transition: background-position 0.1s linear;
	transition: background-position 0.1s linear;

}
</style>