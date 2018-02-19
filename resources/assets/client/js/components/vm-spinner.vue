<template>
    <span class="spinner-circle inversed"></span>
</template>

<script>
    export default {}
</script>

<style>
    .spinner-circle {
        box-sizing: border-box;
        height: 60px;
        width: 60px;
        border: 0 solid #343434;
        border-radius: 50%;
        box-shadow: 0 -20px 0 24px #343434 inset;
        animation: rotate 1s infinite linear;
        position: absolute;
        display: inline;
        z-index: 1;
    }
    .spinner-circle .inversed {
        border: 0 solid #ffffff;
        box-shadow: 0 -20px 0 24px #ffffff inset;

    }


    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>