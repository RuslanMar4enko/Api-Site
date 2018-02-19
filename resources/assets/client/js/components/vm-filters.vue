<template>
    <section class="search-products">
        <div class=" top-block-content clear">
            <div class="container">
                <div class="row">
                    <div class="dropdown">
                        <button class="btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                            ФИЛЬТР
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <div class="top-block-search col-xs-12">
                                <form class="main-search-form" action="#" method="post">
                                    <div class="main-search-form__input-group">
                                        <slot name="inputs" :filter="filter"></slot>
                                    </div>
                                </form>
                            </div>
                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {}
</script>