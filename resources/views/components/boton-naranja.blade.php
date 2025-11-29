@props(['href' => '#'])
@props(['type' => 'button'])

@if($type === 'submit')
    <button type="submit" {{ $attributes->merge(['class' => 'btn btn-amarillo']) }}>
        {{ $slot }}
    </button>
@else
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'btn btn-amarillo']) }}>
        {{ $slot }}
    </a>
@endif

<style>
.btn-amarillo {
	color: #ffffff;
	text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
	background-color: #e67e22;
	background-image: -moz-linear-gradient(top, #f39c12, #d35400);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#f39c12), to(#d35400));
	background-image: -webkit-linear-gradient(top, #f39c12, #d35400);
	background-image: -o-linear-gradient(top, #f39c12, #d35400);
	background-image: linear-gradient(to bottom, #f39c12, #d35400);
	background-repeat: repeat-x;
	border-color: #d35400 #d35400 #a84300;
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


.btn-amarillo:hover,
.btn-amarillo:focus,
.btn-amarillo:active,
.btn-amarillo.active,
.btn-amarillo.disabled,
.btn-amarillo[disabled] {
    color: #ffffff;
    background-color: #d35400;
}

.btn:hover, .btn:focus {
	text-decoration: none;
	background-position: 0 -15px;
	-webkit-transition: background-position 0.1s linear;
	transition: background-position 0.1s linear;

}
</style>