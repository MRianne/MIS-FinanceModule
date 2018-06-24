
/*pie chart*/
$animation: cubic-bezier(0.42, -0.19, 0.41, 1.16);
$animationlabels: cubic-bezier(0.42, -0.19, 0.41, 1.16);
$animation-duration: 10s;
$segment-offset: -15;

$background: #f6f7fb;
$figcaption-color: #255aa8;
$label-color: #3d434c;

$mobile: "(max-width: 780px)";
$desktop: "(max-width: 1170px)";

@mixin mobile {
	@media #{$mobile} {
		@content;
	}
}

@mixin desktop {
	@media #{$desktop} {
		@content;
	}
}

$Branding: #62dff7;
$Design: #01c8fb;
$Messe: #01b2e3;
$ECommerce: #0097cf;
$Multimedia: #0b75b3;
$Digital: #255aa8;

$data: (branding, $Branding),  (design, $Design),  (messe, $Messe),
	 (ecommerce, $ECommerce),  (multimedia, $Multimedia),  (digital, $Digital);
$i: 0;
$datalength: length($data);

@mixin segments {
	@each $data, $item in $data {
		.segment--#{$data} {
			stroke: $item;
			animation: segment-#{$data} $animation-duration $animation infinite both;
		}
	}
}

@mixin segment-keyframes {
	@each $data, $item in $data {
		$i: $i + 1;
		@keyframes segment-#{$data} {
			10%, 100% {
				opacity: 1;
				stroke-dashoffset: (15+$i*$segment-offset);
			}
		}
	}
}

@mixin labels {
	@each $data, $item in $data {
		$i: $i + 1;
		.label--#{$data} {
			animation: label-animation $animation-duration $animationlabels
				($animation-duration/10/$datalength*($i - 1)) infinite both;
		}
	}
}
	
	.marken-erlebnis {
		background-color: $background;
		padding: 3.7vw 1vw 5.5vw;
		margin: 0 auto;
	}

	.donut {
		font-size: 13px;
		display: block;
		max-width: 1080px;
		margin: 0 auto;
		&--desktop {
			@include mobile {
				display: none;
			}
		}
		&--mobile {
			display: none;
			@include mobile {
				display: block;
			}
		}
	}

	.figcaption {
		tspan {
			font-size: 2.4px;
			text-transform: uppercase;
			fill: $figcaption-color;
		}
		.large {
			font-size: 5.5px;
			font-weight: 300;
		}
	}

	.segments {
		transform-origin: 50% 50%;
		transform: rotate(-85.7deg) rotateX(30deg) rotateY(50deg);
	}

	.segment {
		fill: transparent;
		opacity: 0;
		transform-origin: 50% 50%;
		transition: all 0.2s ease-out;
		stroke-dasharray: 12 78;
		stroke-width: 10;
		stroke-dashoffset: 15;
	}

	.inner {
		fill: $background;
	}

	@include segments;
	@include segment-keyframes;

	.label_text {
		fill: $label-color;
		font-size: 0.16em;
		font-weight: 300;
		transition: all 0.2s ease-out;
		.donut--mobile & {
			font-size: 0.12em;
		}
		&.right {
			text-anchor: end;
		}
		a {
			cursor: pointer;
		}
	}

	.label_line {
		fill: none;
		stroke: #c7cacf;
		stroke-width: 0.1;
	}

	.label {
		transform: translateY(91px);
		opacity: 0;
		&:hover {
			.label_text {
				fill: black;
			}
		}
	}

	@include labels();

	@keyframes label-animation {
		10%, 100% {
			opacity: 1;
			transform: translateY(0);
		}
	}
