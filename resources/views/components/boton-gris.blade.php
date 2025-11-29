@props(['href' => '#'])
@props(['type' => 'button'])

@if($type === 'submit')
    <button type="submit" {{ $attributes->merge(['class' => 'btn btn-gris']) }}>
        {{ $slot }}
    </button>
@else
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'btn btn-gris']) }}>
        {{ $slot }}
    </a>
@endif

<style>
.btn-gris {
	color: #ffffff;
	text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
	background-color: #6c757d;
	background-image: -moz-linear-gradient(top, #8a9299, #5a6268);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#8a9299), to(#5a6268));
	background-image: -webkit-linear-gradient(top, #8a9299, #5a6268);
	background-image: -o-linear-gradient(top, #8a9299, #5a6268);
	background-image: linear-gradient(to bottom, #8a9299, #5a6268);
	background-repeat: repeat-x;
	border-color: #5a6268 #5a6268 #3e4449;
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


.btn-gris:hover,
.btn-gris:focus,
.btn-gris:active,
.btn-gris.active,
.btn-gris.disabled,
.btn-gris[disabled] {
    color: #ffffff;
    background-color: #5a6268;
}

.btn:hover, .btn:focus {
	text-decoration: none;
	background-position: 0 -15px;
	-webkit-transition: background-position 0.1s linear;
	transition: background-position 0.1s linear;

}
</style>
