@props(['href' => '#'])
@props(['type' => 'button'])

@if($type === 'submit')
    <button type="submit" {{ $attributes->merge(['class' => 'btn btn-azul']) }}>
        {{ $slot }}
    </button>
@else
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'btn btn-azul']) }}>
        {{ $slot }}
    </a>
@endif

<style>
.btn-azul {
	color: #ffffff;
	text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
	background-color: #006dcc;
	background-image: -moz-linear-gradient(top, #0088cc, #0044cc);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0044cc));
	background-image: -webkit-linear-gradient(top, #0088cc, #0044cc);
	background-image: -o-linear-gradient(top, #0088cc, #0044cc);
	background-image: linear-gradient(to bottom, #0088cc, #0044cc);
	background-repeat: repeat-x;
	border-color: #0044cc #0044cc #002a80;
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


.btn-azul:hover,
.btn-azul:focus,
.btn-azul:active,
.btn-azul.active,
.btn-azul.disabled,
.btn-azul[disabled] {
    color: #ffffff;
    background-color: #0044cc;
}

.btn:hover, .btn:focus {
	text-decoration: none;
	background-position: 0 -15px;
	-webkit-transition: background-position 0.1s linear;
	transition: background-position 0.1s linear;

}
</style>