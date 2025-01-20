@extends('front.layout')

@section('content')
    <!-- SECTION HEADLINE -->
    <div class="section-headline-wrap">
        <div class="section-headline">
            <h2>سوالات متداول</h2>
            <p>صفحه اصلی<span class="separator">/</span><span class="current-section">سوالات متداول</span></p>
        </div>
    </div>
    <!-- /SECTION HEADLINE -->



        <!-- ITEM-FAQ -->
        <div class="accordion item-faq tertiary">
            @if(isset($faqs) && count($faqs)>0)
                @foreach($faqs as $faq)
                    @if($faq->show)
                    <!-- ACCORDION ITEM -->
                    <div class="accordion-item">
                        <h6 class="accordion-item-header">{{$faq->title}}</h6>
                        <!-- SVG ARROW -->
                        <svg class="svg-arrow">
                            <use xlink:href="#svg-arrow"></use>
                        </svg>
                        <!-- /SVG ARROW -->
                        <div class="accordion-item-content">

                            <p>

                                {!! html_entity_decode($faq->text) !!}
                            </p>
                        </div>
                    </div>
                    <!-- /ACCORDION ITEM -->
                    @endif

                @endforeach
            @endif


        </div>
        <!-- /ITEM-FAQ -->

@endsection
