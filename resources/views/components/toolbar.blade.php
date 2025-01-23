<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ $title }}</h1>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!--end::Separator-->

            <!--begin::Breadcrumb-->
            @if (!empty($breadcrumbs))
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    @foreach ($breadcrumbs as $breadcrumb)
                        <li class="breadcrumb-item {{ $breadcrumb['active'] ?? false ? 'text-dark' : 'text-muted' }}">
                            @if (!empty($breadcrumb['url']) && empty($breadcrumb['active']))
                                <a href="{{ $breadcrumb['url'] }}" class="text-muted text-hover-primary">
                                    {{ $breadcrumb['label'] }}
                                </a>
                            @else
                                <span>{{ $breadcrumb['label'] }}</span>
                            @endif
                        </li>

                        @if (!$loop->last)
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-300 w-5px h-2px"></span>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endif
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        @if (!empty($actionUrl))
            <!-- Render as a link if actionUrl is provided -->
            <a href="{{ $actionUrl }}" class="btn btn-sm btn-primary">
                @if (!empty($actionIcon))
                    <i class="{{ $actionIcon }}"></i>
                @endif
                {{ $actionLabel ?? 'Create' }}
            </a>
        @elseif (!empty($modalTarget))
            <!-- Render as a button if modalTarget is provided -->
            <button type="button" class="btn btn-sm btn-primary" id="{{ $modalTarget }}">
                @if (!empty($actionIcon))
                    <i class="{{ $actionIcon }}"></i>
                @endif
                {{ $actionLabel ?? 'Create' }}
            </button>
        @endif
        <!--end::Actions-->

    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->
