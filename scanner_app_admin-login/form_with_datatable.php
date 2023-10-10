
<!DOCTYPE html>

<html lang="en" >
    <!--begin::Head-->
    <head>
		<!-- <base href="dist/"> -->
                <meta charset="utf-8"/>
        <title>Metronic | Multi Column Forms</title>
        <meta name="description" content="Multi column form examples"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->



        <!--begin::Global Theme Styles(used by all pages)-->
                    <link href="dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
                    <link href="dist/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css"/>
                    <link href="dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>
                <!--end::Global Theme Styles-->

        <!--begin::Layout Themes(used by all pages)-->

<link href="dist/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css"/>
<link href="dist/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css"/>
<link href="dist/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css"/>
<link href="dist/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css"/>        <!--end::Layout Themes-->

        <link rel="shortcut icon" href="dist/assets/media/logos/favicon.ico"/>

            </head>
    <!--end::Head-->

    <!--begin::Body-->
    <body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >

    	<!--begin::Main-->
	<!--begin::Header Mobile-->
<div id="kt_header_mobile" class="header-mobile align-items-center  header-mobile-fixed " >
	<!--begin::Logo-->
	<a href="index.html">
		<img alt="Logo" src="dist/assets/media/logos/logo-light.png"/>
	</a>
	<!--end::Logo-->

	<!--begin::Toolbar-->
	<div class="d-flex align-items-center">
					<!--begin::Aside Mobile Toggle-->
			<button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
				<span></span>
			</button>
			<!--end::Aside Mobile Toggle-->

					<!--begin::Header Menu Mobile Toggle-->
			<button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
				<span></span>
			</button>
			<!--end::Header Menu Mobile Toggle-->

		<!--begin::Topbar Mobile Toggle-->
		<button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
			<span class="svg-icon svg-icon-xl"><!--begin::Svg Icon | path:dist/assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span>		</button>
		<!--end::Topbar Mobile Toggle-->
	</div>
	<!--end::Toolbar-->
</div>
<!--end::Header Mobile-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="d-flex flex-row flex-column-fluid page">

<!--begin::Aside-->
<div class="aside aside-left  aside-fixed  d-flex flex-column flex-row-auto"  id="kt_aside">
	<!--begin::Brand-->
	<div class="brand flex-column-auto " id="kt_brand">
		<!--begin::Logo-->
		<a href="index.html" class="brand-logo">
			<img alt="Logo" src="dist/assets/media/logos/logo-light.png"/>
		</a>
		<!--end::Logo-->

					<!--begin::Toggle-->
			<button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
				<span class="svg-icon svg-icon svg-icon-xl"><!--begin::Svg Icon | path:dist/assets/media/svg/icons/Navigation/Angle-double-left.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) "/>
        <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) "/>
    </g>
</svg><!--end::Svg Icon--></span>			</button>
			<!--end::Toolbar-->
			</div>
	<!--end::Brand-->

	<!--begin::Aside Menu-->
	<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

		<!--begin::Menu Container-->
		<div
			id="kt_aside_menu"
			class="aside-menu my-4 "
			data-menu-vertical="1"
			 data-menu-scroll="1" data-menu-dropdown-timeout="500" 			>
			<!--begin::Menu Nav-->
			<ul class="menu-nav ">
				<li class="menu-item " aria-haspopup="true" ><a  href="index.html" class="menu-link "><span class="svg-icon menu-icon"><!--begin::Svg Icon | path:dist/assets/media/svg/icons/Design/Layers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"/>
        <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span><span class="menu-text">Dashboard</span></a></li>

<li class="menu-item " aria-haspopup="true" ><a  href="index.html" class="menu-link "><span class="svg-icon menu-icon"><!--begin::Svg Icon | path:dist/assets/media/svg/icons/Design/Layers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"/>
        <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span><span class="menu-text">Dashboard</span></a></li>

	<!-- adding space -->
<li class="menu-section ">
                
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>


			<!-- adding space -->


			
			
			</ul>			<!--end::Menu Nav-->
		</div>
		<!--end::Menu Container-->
	</div>
	<!--end::Aside Menu-->
</div>
<!--end::Aside-->

			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
				<!--begin::Header-->
<div id="kt_header" class="header  header-fixed " >
	<!--begin::Container-->
	<div class=" container-fluid  d-flex align-items-stretch justify-content-between">
					<!--begin::Header Menu Wrapper-->
			<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
								<!--begin::Header Menu-->
				<div id="kt_header_menu" class="header-menu header-menu-mobile  header-menu-layout-default " >
					<!--begin::Header Nav-->

					<!--end::Header Nav-->
				</div>
				<!--end::Header Menu-->
			</div>
			<!--end::Header Menu Wrapper-->

		<!--begin::Topbar-->
		<div class="topbar">
		    		    			            <!--begin::Search-->
		    		
		            <!--end::Search-->

		    	

		    		
		            <!--end::Quick Actions-->

					        		           	<!--begin::Cart-->
		           
		            <!--end::Cart-->

		    		        <!--begin::Quick panel-->
		        
		        <!--end::Quick panel-->

							<!--begin::Chat-->
				
				<!--end::Chat-->

		    		        <!--begin::Languages-->
		       
		        <!--end::Languages-->

		    		        		            <!--begin::User-->
		            <div class="topbar-item">
		                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
							<span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
		                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">Sean</span>
		                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
		                        <span class="symbol-label font-size-h5 font-weight-bold">S</span>
		                    </span>
		                </div>
		            </div>
		            <!--end::User-->
		        		    		</div>
		<!--end::Topbar-->
	</div>
	<!--end::Container-->
</div>
<!--end::Header-->

				<!--begin::Content-->
				<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">




<!-- sub header ********************************************************************************************* -->
											<!--begin::Subheader-->
<!-- <div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
    <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		
    </div>
</div> -->
<!--end::Subheader-->

<!-- sub header ********************************************************************************************* -->


					<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class=" container ">
			<div class="row">
	<div class="col-lg-12">
		<!--begin::Card-->
		<div class="card card-custom gutter-b example example-compact">
			<div class="card-header">
				<h3 class="card-title">
					User form
				</h3>
				<div class="card-toolbar">
					<div class="example-tools justify-content-center">
						<span class="example-copy" data-toggle="tooltip"></span>
					</div>
				</div>
			</div>
			<!--begin::Form-->
			<form class="form">
				<div class="card-body">
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Full Name:</label>
							<input type="email" class="form-control" placeholder="Enter full name"/>
							<span class="form-text text-muted">Please enter your full name</span>
						</div>
						<div class="col-lg-6">
							<label>Contact Number:</label>
							<input type="email" class="form-control" placeholder="Enter contact number"/>
							<span class="form-text text-muted">Please enter your contact number</span>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Address:</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Enter your address"/>
								<div class="input-group-append"><span class="input-group-text"><i class="la la-map-marker"></i></span></div>
							</div>
							<span class="form-text text-muted">Please enter your address</span>
						</div>
						<div class="col-lg-6">
							<label>Postcode:</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Enter your postcode"/>
								<div class="input-group-append"><span class="input-group-text"><i class="la la-bookmark-o"></i></span></div>
							</div>
							<span class="form-text text-muted">Please enter your postcode</span>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>User Group:</label>
							<div class="radio-inline">
								<label class="radio radio-solid">
									<input type="radio" name="example_2" checked="checked" value="2"/>
									<span></span>
									Sales Person
								</label>
								<label class="radio radio-solid">
									<input type="radio" name="example_2" value="2"/>
									<span></span>
									Customer
								</label>
							</div>
							<span class="form-text text-muted">Please select user group</span>
						</div>
					</div>

					<!-- begin: Example Code-->
					<div class="example-code mt-10">
						<ul class="example-nav nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-2x">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#example_code_html" >HTML</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="example_code_html" role="tabpanel">
								<div class="example-highlight"><pre style="height:400px"><code class="language-html">
								&lt;form class=&quot;form&quot;&gt;
									&lt;div class=&quot;card-body&quot;&gt;
										&lt;div class=&quot;form-group row&quot;&gt;
											&lt;div class=&quot;col-lg-6&quot;&gt;
												&lt;label&gt;Full Name:&lt;/label&gt;
												&lt;input type=&quot;email&quot; class=&quot;form-control&quot; placeholder=&quot;Enter full name&quot;/&gt;
												&lt;span class=&quot;form-text text-muted&quot;&gt;Please enter your full name&lt;/span&gt;
											&lt;/div&gt;
											&lt;div class=&quot;col-lg-6&quot;&gt;
												&lt;label&gt;Contact Number:&lt;/label&gt;
												&lt;input type=&quot;email&quot; class=&quot;form-control&quot; placeholder=&quot;Enter contact number&quot;/&gt;
												&lt;span class=&quot;form-text text-muted&quot;&gt;Please enter your contact number&lt;/span&gt;
											&lt;/div&gt;
										&lt;/div&gt;
										&lt;div class=&quot;form-group row&quot;&gt;
											&lt;div class=&quot;col-lg-6&quot;&gt;
												&lt;label&gt;Address:&lt;/label&gt;
												&lt;div class=&quot;input-group&quot;&gt;
													&lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Enter your address&quot;/&gt;
													&lt;div class=&quot;input-group-append&quot;&gt;&lt;span class=&quot;input-group-text&quot;&gt;&lt;i class=&quot;la la-map-marker&quot;&gt;&lt;/i&gt;&lt;/span&gt;&lt;/div&gt;
												&lt;/div&gt;
												&lt;span class=&quot;form-text text-muted&quot;&gt;Please enter your address&lt;/span&gt;
											&lt;/div&gt;
											&lt;div class=&quot;col-lg-6&quot;&gt;
												&lt;label&gt;Postcode:&lt;/label&gt;
												&lt;div class=&quot;input-group&quot;&gt;
													&lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Enter your postcode&quot;/&gt;
													&lt;div class=&quot;input-group-append&quot;&gt;&lt;span class=&quot;input-group-text&quot;&gt;&lt;i class=&quot;la la-bookmark-o&quot;&gt;&lt;/i&gt;&lt;/span&gt;&lt;/div&gt;
												&lt;/div&gt;
												&lt;span class=&quot;form-text text-muted&quot;&gt;Please enter your postcode&lt;/span&gt;
											&lt;/div&gt;
										&lt;/div&gt;
										&lt;div class=&quot;form-group row&quot;&gt;
											&lt;div class=&quot;col-lg-6&quot;&gt;
												&lt;label&gt;User Group:&lt;/label&gt;
												&lt;div class=&quot;radio-inline&quot;&gt;
													&lt;label class=&quot;radio radio-solid&quot;&gt;
														&lt;input type=&quot;radio&quot; name=&quot;example_2&quot; checked=&quot;checked&quot; value=&quot;2&quot;/&gt;
														&lt;span&gt;&lt;/span&gt;
														Sales Person
													&lt;/label&gt;
													&lt;label class=&quot;radio radio-solid&quot;&gt;
														&lt;input type=&quot;radio&quot; name=&quot;example_2&quot; value=&quot;2&quot;/&gt;
														&lt;span&gt;&lt;/span&gt;
														Customer
													&lt;/label&gt;
												&lt;/div&gt;
												&lt;span class=&quot;form-text text-muted&quot;&gt;Please select user group&lt;/span&gt;
											&lt;/div&gt;
										&lt;/div&gt;
									&lt;/div&gt;
									&lt;div class=&quot;card-footer&quot;&gt;
										&lt;div class=&quot;row&quot;&gt;
											&lt;div class=&quot;col-lg-6&quot;&gt;
												&lt;button type=&quot;reset&quot; class=&quot;btn btn-primary mr-2&quot;&gt;Save&lt;/button&gt;
												&lt;button type=&quot;reset&quot; class=&quot;btn btn-secondary&quot;&gt;Cancel&lt;/button&gt;
											&lt;/div&gt;
											&lt;div class=&quot;col-lg-6 text-right&quot;&gt;
												&lt;button type=&quot;reset&quot; class=&quot;btn btn-danger&quot;&gt;Delete&lt;/button&gt;
											&lt;/div&gt;
										&lt;/div&gt;
									&lt;/div&gt;
								&lt;/form&gt;
								</code></pre></div>							</div>
						</div>
					</div>
					<!-- end: Example Code-->
				</div>
				<div class="card-footer">
					<div class="row">
						<div class="col-lg-6">
							<button type="reset" class="btn btn-primary mr-2">Save</button>
							<button type="reset" class="btn btn-secondary">Cancel</button>
						</div>
						<div class="col-lg-6 text-right">
							<button type="reset" class="btn btn-danger">Delete</button>
						</div>
					</div>
				</div>
			</form>
			<!--end::Form-->
		</div>
		<!--end::Card-->

		<!--begin::Card-->

		<!--end::Card-->

		<!--begin::Card-->

		<!--end::Card-->

		<!--begin::Card-->

		<!--end::Card-->
	</div>
</div>
		</div>
		<!--end::Container-->
		
	</div>
	<!--end::Entry-->
	
	

	<!--************************************ start datatable here************************************************* -->
	
<!-- conatiner to give space after form  and after ending of datatabe -->
	<div class="container">
		<!-- conatiner to give space after form  and after ending of datatabe -->
<!--begin::Card-->
<div class="card card-custom gutter-b">
	<div class="card-header flex-wrap py-3">
		<div class="card-title">
			<h3 class="card-label">
				Basic Demo
				<span class="d-block text-muted pt-2 font-size-sm">sorting & pagination remote datasource</span>
			</h3>
		</div>
		<div class="card-toolbar">
			<!--begin::Dropdown-->
    <div class="dropdown dropdown-inline mr-2">


	<!--begin::Dropdown Menu-->
	
	<!--end::Dropdown Menu-->
</div>
<!--end::Dropdown-->

<!--begin::Button-->
<!-- <a href="#" class="btn btn-primary font-weight-bolder">
	<span class="svg-icon svg-icon-md">
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <circle fill="#000000" cx="9" cy="15" r="6"/>
        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"/>
    </g>
</svg></span>	New Record
</a> -->
<!--end::Button-->
		</div>
	</div>
	<div class="card-body">
		<!--begin: Datatable-->
		<table class="table table-bordered table-checkable" id="kt_datatable">
			                    <thead>
                              <tr>
                                              <th>Record ID</th>
                                              <th>Order ID</th>
                                              <th>Country</th>
                                              <th>Ship City</th>
                                              <th>Ship Address</th>
                                              <th>Company Agent</th>
                                              <th>Company Name</th>
                                              <th>Ship Date</th>
                                              <th>Status</th>
                                              <th>Type</th>
                                              <th>Actions</th>
                                  </tr>
                    </thead>

                        <tbody>
                            <tr>
                                              <td>1</td>
                                              <td>64616-103</td>
                                              <td>Brazil</td>
                                              <td>São Félix do Xingu</td>
                                              <td>698 Oriole Pass</td>
                                              <td>Hayes Boule</td>
                                              <td>Casper-Kerluke</td>
                                              <td>10/15/2017</td>
                                              <td>5</td>
                                              <td>1</td>
                                              <td nowrap></td>
                                  </tr>
                            <tr>
                                              <td>2</td>
                                              <td>54868-3377</td>
                                              <td>Vietnam</td>
                                              <td>Bình Minh</td>
                                              <td>8998 Delaware Court</td>
                                              <td>Humbert Bresnen</td>
                                              <td>Hodkiewicz and Sons</td>
                                              <td>4/24/2016</td>
                                              <td>2</td>
                                              <td>2</td>
                                              <td nowrap></td>
                                  </tr>
                            <tr>
                                              <td>3</td>
                                              <td>0998-0355</td>
                                              <td>Philippines</td>
                                              <td>Palagao Norte</td>
                                              <td>91796 Sutteridge Road</td>
                                              <td>Jareb Labro</td>
                                              <td>Kuhlman Inc</td>
                                              <td>7/11/2017</td>
                                              <td>6</td>
                                              <td>2</td>
                                              <td nowrap></td>
                                  </tr>
                          <tr>
                                              <td>48</td>
                                              <td>49483-052</td>
                                              <td>Indonesia</td>
                                              <td>Kebonjaya</td>
                                              <td>2 Oakridge Crossing</td>
                                              <td>Reinold Jolland</td>
                                              <td>Zieme-Funk</td>
                                              <td>5/24/2016</td>
                                              <td>4</td>
                                              <td>2</td>
                                              <td nowrap></td>
                                  </tr>
                            <tr>
                                              <td>49</td>
                                              <td>10812-357</td>
                                              <td>Serbia</td>
                                              <td>Ruma</td>
                                              <td>7 Wayridge Plaza</td>
                                              <td>Ky Brainsby</td>
                                              <td>Towne Inc</td>
                                              <td>11/1/2016</td>
                                              <td>2</td>
                                              <td>3</td>
                                              <td nowrap></td>
                                  </tr>
                            <tr>
                                              <td>50</td>
                                              <td>49349-222</td>
                                              <td>China</td>
                                              <td>Zhulan</td>
                                              <td>55385 Stoughton Trail</td>
                                              <td>Sheryl Giddings</td>
                                              <td>Grimes, Ryan and Larkin</td>
                                              <td>9/15/2017</td>
                                              <td>3</td>
                                              <td>1</td>
                                              <td nowrap></td>
                                  </tr>
                        </tbody>

        		</table>
		<!--end: Datatable-->
	</div>
</div>
<!--end::Card-->


<!-- conatiner to give space before form  and after ending of datatabe -->
</div>
<!-- conatiner to give space before form  and after ending of datatabe -->

<!-- *********************************** end datable here ************************************************* -->
									

	



				</div>
				<!--end::Content-->




<!--begin::Footer-->
<div class="footer bg-white py-4 d-flex flex-lg-column " id="kt_footer">
	<!--begin::Container-->
	<div class=" container-fluid  d-flex flex-column flex-md-row align-items-center justify-content-between">
		<!--begin::Copyright-->
		<div class="text-dark order-2 order-md-1">
			<span class="text-muted font-weight-bold mr-2">2020&copy;</span>
			<a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary">Keenthemes</a>
		</div>
		<!--end::Copyright-->

		<!--begin::Nav-->
		<div class="nav nav-dark">
			<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">About</a>
			<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">Team</a>
			<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-0">Contact</a>
		</div>
		<!--end::Nav-->
	</div>
	<!--end::Container-->
</div>
<!--end::Footer-->
							</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
<!--end::Main-->




<!-- singout panel **************************************************************************************** -->
                    		<!-- begin::User Panel-->
<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
	<!--begin::Header-->
	<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
		<h3 class="font-weight-bold m-0">
			User Profile
			<small class="text-muted font-size-sm ml-2"></small>
		</h3>
		<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
			<i class="ki ki-close icon-xs text-muted"></i>
		</a>
	</div>
	<!--end::Header-->

	<!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5">
		<!--begin::Header-->
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <div class="symbol-label" style="background-image:url('dist/assets/media/users/300_21.jpg')"></div>
				<i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
					James Jones
				</a>
                <div class="text-muted mt-1">
                    Application Developer
                </div>
                <div class="navi mt-2">
                    <a href="#" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                            <span class="navi-icon mr-1">
								<span class="svg-icon svg-icon-lg svg-icon-primary"><!--begin::Svg Icon | path:dist/assets/media/svg/icons/Communication/Mail-notification.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"/>
        <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"/>
    </g>
</svg><!--end::Svg Icon--></span>							</span>
                            <span class="navi-text text-muted text-hover-primary">jm@softplus.com</span>
                        </span>
                    </a>

					<a href="logout.php?logout" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
                </div>
            </div>
        </div>
		<!--end::Header-->

		<!--begin::Separator-->
		<div class="separator separator-dashed mt-8 mb-5"></div>
		<!--end::Separator-->

		<!--begin::Nav-->
		<div class="navi navi-spacer-x-0 p-0">
		    <!--begin::Item-->
		    
		    <!--end:Item-->

		    <!--begin::Item-->
		    
		    <!--end:Item-->

		    <!--begin::Item-->
		
		    <!--end:Item-->

		    <!--begin::Item-->
		
		    <!--end:Item-->
		</div>
		<!--end::Nav-->

		<!--begin::Separator-->
		<div class="separator separator-dashed my-7"></div>
		<!--end::Separator-->

		<!--begin::Notifications-->
		
		<!--end::Notifications-->
    </div>
	<!--end::Content-->
</div>
<!-- end::User Panel-->
<!-- singout panel **************************************************************************************** -->


<!--begin::Quick Cart-->

<!--end::Quick Cart-->

                            <!--begin::Quick Panel-->

<!--end::Quick Panel-->

                            <!--begin::Chat Panel-->
<div class="modal modal-sticky modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
   
<!--end::Chat Panel-->

                            <!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
	<span class="svg-icon"><!--begin::Svg Icon | path:dist/assets/media/svg/icons/Navigation/Up-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
        <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span></div>
<!--end::Scrolltop-->

                            <!--begin::Sticky Toolbar-->

<!--end::Sticky Toolbar-->
                <!--begin::Demo Panel-->
<div id="kt_demo_panel" class="offcanvas offcanvas-right p-10">
	<!--begin::Header-->
	<div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
		<h4 class="font-weight-bold m-0">
			Select A Demo
		</h4>
		<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_demo_panel_close">
			<i class="ki ki-close icon-xs text-muted"></i>
		</a>
	</div>
	<!--end::Header-->

	<!--begin::Content-->
	<div class="offcanvas-content">
		<!--begin::Wrapper-->
	
		<!--end::Wrapper-->

		<!--begin::Purchase-->
		<div class="offcanvas-footer">
			<a href="https://1.envato.market/EA4JP" target="_blank" class="btn btn-block btn-danger btn-shadow font-weight-bolder text-uppercase">
				Buy Metronic Now!
			</a>
		</div>
		<!--end::Purchase-->
	</div>
	<!--end::Content-->
</div>
<!--end::Demo Panel-->

        <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>
            var KTAppSettings = {
    "breakpoints": {
        "sm": 576,
        "md": 768,
        "lg": 992,
        "xl": 1200,
        "xxl": 1400
    },
    "colors": {
        "theme": {
            "base": {
                "white": "#ffffff",
                "primary": "#3699FF",
                "secondary": "#E5EAEE",
                "success": "#1BC5BD",
                "info": "#8950FC",
                "warning": "#FFA800",
                "danger": "#F64E60",
                "light": "#E4E6EF",
                "dark": "#181C32"
            },
            "light": {
                "white": "#ffffff",
                "primary": "#E1F0FF",
                "secondary": "#EBEDF3",
                "success": "#C9F7F5",
                "info": "#EEE5FF",
                "warning": "#FFF4DE",
                "danger": "#FFE2E5",
                "light": "#F3F6F9",
                "dark": "#D6D6E0"
            },
            "inverse": {
                "white": "#ffffff",
                "primary": "#ffffff",
                "secondary": "#3F4254",
                "success": "#ffffff",
                "info": "#ffffff",
                "warning": "#ffffff",
                "danger": "#ffffff",
                "light": "#464E5F",
                "dark": "#ffffff"
            }
        },
        "gray": {
            "gray-100": "#F3F6F9",
            "gray-200": "#EBEDF3",
            "gray-300": "#E4E6EF",
            "gray-400": "#D1D3E0",
            "gray-500": "#B5B5C3",
            "gray-600": "#7E8299",
            "gray-700": "#5E6278",
            "gray-800": "#3F4254",
            "gray-900": "#181C32"
        }
    },
    "font-family": "Poppins"
};
        </script>
        <!--end::Global Config-->

    	<!--begin::Global Theme Bundle(used by all pages)-->
    	    	   <script src="dist/assets/plugins/global/plugins.bundle.js"></script>
		    	   <script src="dist/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		    	   <script src="dist/assets/js/scripts.bundle.js"></script>
				<!--end::Global Theme Bundle-->


            </body>
    <!--end::Body-->
</html>