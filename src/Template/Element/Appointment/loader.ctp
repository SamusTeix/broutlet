<style>
    #loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
    }

    .loader-overlay {
        background-color: rgba(0, 0, 0, 0.5);
        width: 100%;
        height: 100%;
    }

    .loader-spinner {
        border: 8px solid #f3f3f3;
        border-radius: 50%;
        border-top: 8px solid #3498db;
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    @keyframes spin {
        0% {
            transform: translate(-50%, -50%) rotate(0deg);
        }

        100% {
            transform: translate(-50%, -50%) rotate(360deg);
        }
    }
</style>

<div id="loader" style="display: none;">
    <div class="loader-overlay"></div>
    <div class="loader-spinner"></div>
</div>

<script>
    function loader(show = false) {
        document.getElementById('loader').style.display = show ? 'block' : 'none';
    }
</script>