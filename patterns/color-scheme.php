<h2><?php esc_attr_e( 'Color Palette', 'WpAdminStyle' ); ?></h2>
<p><?php printf( __( 'See <a href="%s" target="_blank">the official post for the changes since WordPress version 5.7</a>.',
		'WpAdminStyle' ),
		esc_url( 'https://make.wordpress.org/core/2021/02/23/standardization-of-wp-admin-colors-in-wordpress-5-7/' ) ); ?></p>

<style>
	.color-white {
		color: #fff;
	}

	.color-black {
		color: #000;
	}

	.color-gray-0 {
		color: #f6f7f7;
	}

	.color-gray-2 {
		color: #f0f0f1;
	}

	.color-gray-5 {
		color: #dcdcde;
	}

	.color-gray-10 {
		color: #c3c4c7;
	}

	.color-gray-20 {
		color: #a7aaad;
	}

	.color-gray-30 {
		color: #8c8f94;
	}

	.color-gray-40 {
		color: #787c82;
	}

	.color-gray-50 {
		color: #646970;
	}

	.color-gray-60 {
		color: #50575e;
	}

	.color-gray-70 {
		color: #3c434a;
	}

	.color-gray-80 {
		color: #2c3338;
	}

	.color-gray-90 {
		color: #1d2327;
	}

	.color-gray-100 {
		color: #101517;
	}

	.color-blue-0 {
		color: #f0f6fc;
	}

	.color-blue-5 {
		color: #c5d9ed;
	}

	.color-blue-10 {
		color: #9ec2e6;
	}

	.color-blue-20 {
		color: #72aee6;
	}

	.color-blue-30 {
		color: #4f94d4;
	}

	.color-blue-40 {
		color: #3582c4;
	}

	.color-blue-50 {
		color: #2271b1;
	}

	.color-blue-60 {
		color: #135e96;
	}

	.color-blue-70 {
		color: #0a4b78;
	}

	.color-blue-80 {
		color: #043959;
	}

	.color-blue-90 {
		color: #01263a;
	}

	.color-blue-100 {
		color: #00131c;
	}

	.color-red-0 {
		color: #fcf0f1;
	}

	.color-red-5 {
		color: #facfd2;
	}

	.color-red-10 {
		color: #ffabaf;
	}

	.color-red-20 {
		color: #ff8085;
	}

	.color-red-30 {
		color: #f86368;
	}

	.color-red-40 {
		color: #e65054;
	}

	.color-red-50 {
		color: #d63638;
	}

	.color-red-60 {
		color: #b32d2e;
	}

	.color-red-70 {
		color: #8a2424;
	}

	.color-red-80 {
		color: #691c1c;
	}

	.color-red-90 {
		color: #451313;
	}

	.color-red-100 {
		color: #240a0a;
	}

	.color-yellow-0 {
		color: #fcf9e8;
	}

	.color-yellow-5 {
		color: #f5e6ab;
	}

	.color-yellow-10 {
		color: #f2d675;
	}

	.color-yellow-20 {
		color: #f0c33c;
	}

	.color-yellow-30 {
		color: #dba617;
	}

	.color-yellow-40 {
		color: #bd8600;
	}

	.color-yellow-50 {
		color: #996800;
	}

	.color-yellow-60 {
		color: #755100;
	}

	.color-yellow-70 {
		color: #614200;
	}

	.color-yellow-80 {
		color: #4a3200;
	}

	.color-yellow-90 {
		color: #362400;
	}

	.color-yellow-100 {
		color: #211600;
	}

	.color-green-0 {
		color: #edfaef;
	}

	.color-green-5 {
		color: #b8e6bf;
	}

	.color-green-10 {
		color: #68de7c;
	}

	.color-green-20 {
		color: #1ed14b;
	}

	.color-green-30 {
		color: #00ba37;
	}

	.color-green-40 {
		color: #00a32a;
	}

	.color-green-50 {
		color: #008a20;
	}

	.color-green-60 {
		color: #007017;
	}

	.color-green-70 {
		color: #005c12;
	}

	.color-green-80 {
		color: #00450c;
	}

	.color-green-90 {
		color: #003008;
	}

	.color-green-100 {
		color: #001c05;
	}

	.background-white {
		background: #fff;
	}

	.background-black {
		background: #000;
	}

	.background-gray-0 {
		background: #f6f7f7;
	}

	.background-gray-2 {
		background: #f0f0f1;
	}

	.background-gray-5 {
		background: #dcdcde;
	}

	.background-gray-10 {
		background: #c3c4c7;
	}

	.background-gray-20 {
		background: #a7aaad;
	}

	.background-gray-30 {
		background: #8c8f94;
	}

	.background-gray-40 {
		background: #787c82;
	}

	.background-gray-50 {
		background: #646970;
	}

	.background-gray-60 {
		background: #50575e;
	}

	.background-gray-70 {
		background: #3c434a;
	}

	.background-gray-80 {
		background: #2c3338;
	}

	.background-gray-90 {
		background: #1d2327;
	}

	.background-gray-100 {
		background: #101517;
	}

	.background-blue-0 {
		background: #f0f6fc;
	}

	.background-blue-5 {
		background: #c5d9ed;
	}

	.background-blue-10 {
		background: #9ec2e6;
	}

	.background-blue-20 {
		background: #72aee6;
	}

	.background-blue-30 {
		background: #4f94d4;
	}

	.background-blue-40 {
		background: #3582c4;
	}

	.background-blue-50 {
		background: #2271b1;
	}

	.background-blue-60 {
		background: #135e96;
	}

	.background-blue-70 {
		background: #0a4b78;
	}

	.background-blue-80 {
		background: #043959;
	}

	.background-blue-90 {
		background: #01263a;
	}

	.background-blue-100 {
		background: #00131c;
	}

	.background-red-0 {
		background: #fcf0f1;
	}

	.background-red-5 {
		background: #facfd2;
	}

	.background-red-10 {
		background: #ffabaf;
	}

	.background-red-20 {
		background: #ff8085;
	}

	.background-red-30 {
		background: #f86368;
	}

	.background-red-40 {
		background: #e65054;
	}

	.background-red-50 {
		background: #d63638;
	}

	.background-red-60 {
		background: #b32d2e;
	}

	.background-red-70 {
		background: #8a2424;
	}

	.background-red-80 {
		background: #691c1c;
	}

	.background-red-90 {
		background: #451313;
	}

	.background-red-100 {
		background: #240a0a;
	}

	.background-yellow-0 {
		background: #fcf9e8;
	}

	.background-yellow-5 {
		background: #f5e6ab;
	}

	.background-yellow-10 {
		background: #f2d675;
	}

	.background-yellow-20 {
		background: #f0c33c;
	}

	.background-yellow-30 {
		background: #dba617;
	}

	.background-yellow-40 {
		background: #bd8600;
	}

	.background-yellow-50 {
		background: #996800;
	}

	.background-yellow-60 {
		background: #755100;
	}

	.background-yellow-70 {
		background: #614200;
	}

	.background-yellow-80 {
		background: #4a3200;
	}

	.background-yellow-90 {
		background: #362400;
	}

	.background-yellow-100 {
		background: #211600;
	}

	.background-green-0 {
		background: #edfaef;
	}

	.background-green-5 {
		background: #b8e6bf;
	}

	.background-green-10 {
		background: #68de7c;
	}

	.background-green-20 {
		background: #1ed14b;
	}

	.background-green-30 {
		background: #00ba37;
	}

	.background-green-40 {
		background: #00a32a;
	}

	.background-green-50 {
		background: #008a20;
	}

	.background-green-60 {
		background: #007017;
	}

	.background-green-70 {
		background: #005c12;
	}

	.background-green-80 {
		background: #00450c;
	}

	.background-green-90 {
		background: #003008;
	}

	.background-green-100 {
		background: #001c05;
	}

	.colors-wrapper {
		display: block;
		line-height: 1.5;
		padding: 0 1rem 1rem;
	}

	.colors-wrapper [class*=background-blue] {
		color: #00131c;
	}

	.colors-wrapper [class*=background-gray] {
		color: #101517;
	}

	.colors-wrapper [class*=background-red] {
		color: #240a0a;
	}

	.colors-wrapper [class*=background-yellow] {
		color: #211600;
	}

	.colors-wrapper [class*=background-green] {
		color: #001c05;
	}

	.colors-wrapper [class*="-50"],
	.colors-wrapper [class*="60"],
	.colors-wrapper [class*="-70"],
	.colors-wrapper [class*="-80"],
	.colors-wrapper [class*="-90"],
	.colors-wrapper [class*="-100"] {
		color: white;
	}

	.colors-wrapper [class^=color-group] {
		display: flex;
		margin-bottom: 0.25rem;
	}

	.color-tile {
		flex: 1;
		padding: 1rem 1rem 5rem;
		line-height: 1.25;
		font-size: 14px;
		overflow: hidden;
	}

	.color-tile .name {
		margin-bottom: 0.25rem;
		text-transform: capitalize;
		font-weight: 700;
	}

	.color-tile .value-code {
		margin-bottom: 0.25rem;
	}

	@media only screen and (max-width: 1100px) {
		.color-tile {
			font-size: 12px;
			padding: 0.5rem 0.5rem 3rem;
		}
	}

	@media only screen and (max-width: 800px) {
		[class^=color-group] {
			flex-direction: column;
		}

		.color-tile {
			font-size: 14px;
		}
	}

	*,
	*:before,
	*:after {
		box-sizing: border-box;
	}
</style>

<div class="colors-wrapper wrapper">
	<section class="color-group-blue">
		<div class="background-blue-0 color-tile">
			<div class="name">Blue 0</div>
			<div class="value-code">#f0f6fc</div>
		</div>
		<div class="background-blue-5 color-tile">
			<div class="name">Blue 5</div>
			<div class="value-code">#c5d9ed</div>
		</div>
		<div class="background-blue-10 color-tile">
			<div class="name">Blue 10</div>
			<div class="value-code">#9ec2e6</div>
		</div>
		<div class="background-blue-20 color-tile">
			<div class="name">Blue 20</div>
			<div class="value-code">#72aee6</div>
		</div>
		<div class="background-blue-30 color-tile">
			<div class="name">Blue 30</div>
			<div class="value-code">#4f94d4</div>
		</div>
		<div class="background-blue-40 color-tile">
			<div class="name">Blue 40</div>
			<div class="value-code">#3582c4</div>
		</div>
		<div class="background-blue-50 color-tile">
			<div class="name">Blue 50</div>
			<div class="value-code">#2271b1</div>
		</div>
		<div class="background-blue-60 color-tile">
			<div class="name">Blue 60</div>
			<div class="value-code">#135e96</div>
		</div>
		<div class="background-blue-70 color-tile">
			<div class="name">Blue 70</div>
			<div class="value-code">#0a4b78</div>
		</div>
		<div class="background-blue-80 color-tile">
			<div class="name">Blue 80</div>
			<div class="value-code">#043959</div>
		</div>
		<div class="background-blue-90 color-tile">
			<div class="name">Blue 90</div>
			<div class="value-code">#01263a</div>
		</div>
		<div class="background-blue-100 color-tile">
			<div class="name">Blue 100</div>
			<div class="value-code">#00131c</div>
		</div>
	</section>
	<section class="color-group-gray">
		<div class="background-gray-0 color-tile">
			<div class="name">Gray 0</div>
			<div class="value-code">#f6f7f7</div>
		</div>
		<div class="background-gray-2 color-tile">
			<div class="name">Gray 2</div>
			<div class="value-code">#f0f0f1</div>
		</div>
		<div class="background-gray-5 color-tile">
			<div class="name">Gray 5</div>
			<div class="value-code">#dcdcde</div>
		</div>
		<div class="background-gray-10 color-tile">
			<div class="name">Gray 10</div>
			<div class="value-code">#c3c4c7</div>
		</div>
		<div class="background-gray-20 color-tile">
			<div class="name">Gray 20</div>
			<div class="value-code">#a7aaad</div>
		</div>
		<div class="background-gray-30 color-tile">
			<div class="name">Gray 30</div>
			<div class="value-code">#8c8f94</div>
		</div>
		<div class="background-gray-40 color-tile">
			<div class="name">Gray 40</div>
			<div class="value-code">#787c82</div>
		</div>
		<div class="background-gray-50 color-tile">
			<div class="name">Gray 50</div>
			<div class="value-code">#646970</div>
		</div>
		<div class="background-gray-60 color-tile">
			<div class="name">Gray 60</div>
			<div class="value-code">#50575e</div>
		</div>
		<div class="background-gray-70 color-tile">
			<div class="name">Gray 70</div>
			<div class="value-code">#3c434a</div>
		</div>
		<div class="background-gray-80 color-tile">
			<div class="name">Gray 80</div>
			<div class="value-code">#2c3338</div>
		</div>
		<div class="background-gray-90 color-tile">
			<div class="name">Gray 90</div>
			<div class="value-code">#1d2327</div>
		</div>
		<div class="background-gray-100 color-tile">
			<div class="name">Gray 100</div>
			<div class="value-code">#101517</div>
		</div>
	</section>
	<section class="color-group-red">
		<div class="background-red-0 color-tile">
			<div class="name">Red 0</div>
			<div class="value-code">#fcf0f1</div>
		</div>
		<div class="background-red-5 color-tile">
			<div class="name">Red 5</div>
			<div class="value-code">#facfd2</div>
		</div>
		<div class="background-red-10 color-tile">
			<div class="name">Red 10</div>
			<div class="value-code">#ffabaf</div>
		</div>
		<div class="background-red-20 color-tile">
			<div class="name">Red 20</div>
			<div class="value-code">#ff8085</div>
		</div>
		<div class="background-red-30 color-tile">
			<div class="name">Red 30</div>
			<div class="value-code">#f86368</div>
		</div>
		<div class="background-red-40 color-tile">
			<div class="name">Red 40</div>
			<div class="value-code">#e65054</div>
		</div>
		<div class="background-red-50 color-tile">
			<div class="name">Red 50</div>
			<div class="value-code">#d63638</div>
		</div>
		<div class="background-red-60 color-tile">
			<div class="name">Red 60</div>
			<div class="value-code">#b32d2e</div>
		</div>
		<div class="background-red-70 color-tile">
			<div class="name">Red 70</div>
			<div class="value-code">#8a2424</div>
		</div>
		<div class="background-red-80 color-tile">
			<div class="name">Red 80</div>
			<div class="value-code">#691c1c</div>
		</div>
		<div class="background-red-90 color-tile">
			<div class="name">Red 90</div>
			<div class="value-code">#451313</div>
		</div>
		<div class="background-red-100 color-tile">
			<div class="name">Red 100</div>
			<div class="value-code">#240a0a</div>
		</div>
	</section>
	<section class="color-group-yellow">
		<div class="background-yellow-0 color-tile">
			<div class="name">Yellow 0</div>
			<div class="value-code">#fcf9e8</div>
		</div>
		<div class="background-yellow-5 color-tile">
			<div class="name">Yellow 5</div>
			<div class="value-code">#f5e6ab</div>
		</div>
		<div class="background-yellow-10 color-tile">
			<div class="name">Yellow 10</div>
			<div class="value-code">#f2d675</div>
		</div>
		<div class="background-yellow-20 color-tile">
			<div class="name">Yellow 20</div>
			<div class="value-code">#f0c33c</div>
		</div>
		<div class="background-yellow-30 color-tile">
			<div class="name">Yellow 30</div>
			<div class="value-code">#dba617</div>
		</div>
		<div class="background-yellow-40 color-tile">
			<div class="name">Yellow 40</div>
			<div class="value-code">#bd8600</div>
		</div>
		<div class="background-yellow-50 color-tile">
			<div class="name">Yellow 50</div>
			<div class="value-code">#996800</div>
		</div>
		<div class="background-yellow-60 color-tile">
			<div class="name">Yellow 60</div>
			<div class="value-code">#755100</div>
		</div>
		<div class="background-yellow-70 color-tile">
			<div class="name">Yellow 70</div>
			<div class="value-code">#614200</div>
		</div>
		<div class="background-yellow-80 color-tile">
			<div class="name">Yellow 80</div>
			<div class="value-code">#4a3200</div>
		</div>
		<div class="background-yellow-90 color-tile">
			<div class="name">Yellow 90</div>
			<div class="value-code">#362400</div>
		</div>
		<div class="background-yellow-100 color-tile">
			<div class="name">Yellow 100</div>
			<div class="value-code">#211600</div>
		</div>
	</section>
	<section class="color-group-green">
		<div class="background-green-0 color-tile">
			<div class="name">Green 0</div>
			<div class="value-code">#edfaef</div>
		</div>
		<div class="background-green-5 color-tile">
			<div class="name">Green 5</div>
			<div class="value-code">#b8e6bf</div>
		</div>
		<div class="background-green-10 color-tile">
			<div class="name">Green 10</div>
			<div class="value-code">#68de7c</div>
		</div>
		<div class="background-green-20 color-tile">
			<div class="name">Green 20</div>
			<div class="value-code">#1ed14b</div>
		</div>
		<div class="background-green-30 color-tile">
			<div class="name">Green 30</div>
			<div class="value-code">#00ba37</div>
		</div>
		<div class="background-green-40 color-tile">
			<div class="name">Green 40</div>
			<div class="value-code">#00a32a</div>
		</div>
		<div class="background-green-50 color-tile">
			<div class="name">Green 50</div>
			<div class="value-code">#008a20</div>
		</div>
		<div class="background-green-60 color-tile">
			<div class="name">Green 60</div>
			<div class="value-code">#007017</div>
		</div>
		<div class="background-green-70 color-tile">
			<div class="name">Green 70</div>
			<div class="value-code">#005c12</div>
		</div>
		<div class="background-green-80 color-tile">
			<div class="name">Green 80</div>
			<div class="value-code">#00450c</div>
		</div>
		<div class="background-green-90 color-tile">
			<div class="name">Green 90</div>
			<div class="value-code">#003008</div>
		</div>
		<div class="background-green-100 color-tile">
			<div class="name">Green 100</div>
			<div class="value-code">#001c05</div>
		</div>
	</section>
</div>
