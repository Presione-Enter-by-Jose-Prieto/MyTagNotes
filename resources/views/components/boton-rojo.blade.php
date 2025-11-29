@props(['href' => '#'])
@props(['type' => 'button'])

@if($type === 'submit')
    <button type="submit" {{ $attributes->merge(['class' => 'btn btn-rojo']) }}>
        {{ $slot }}
    </button>
@else
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'btn btn-rojo']) }}>
        {{ $slot }}
    </a>
@endif

<style>
.btn-rojo {
	color: #ffffff;
	text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
	background-color: #c0392b;
	background-image: -moz-linear-gradient(top, #e74c3c, #b71c1c);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#e74c3c), to(#b71c1c));
	background-image: -webkit-linear-gradient(top, #e74c3c, #b71c1c);
	background-image: -o-linear-gradient(top, #e74c3c, #b71c1c);
	background-image: linear-gradient(to bottom, #e74c3c, #b71c1c);
	background-repeat: repeat-x;
	border-color: #b71c1c #b71c1c #7f0000;
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


.btn-rojo:hover,
.btn-rojo:focus,
.btn-rojo:active,
.btn-rojo.active,
.btn-rojo.disabled,
.btn-rojo[disabled] {
	color: #ffffff;
	background-color: #b71c1c;
}

.btn:hover, .btn:focus {
	text-decoration: none;
	background-position: 0 -15px;
	-webkit-transition: background-position 0.1s linear;
	transition: background-position 0.1s linear;

}
</style>