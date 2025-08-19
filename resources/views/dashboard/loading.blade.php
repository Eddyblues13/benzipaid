@include('dashboard.header')

<div class="content-body">
    <div class="loading-screen">
        <div class="loading-content">
            <h4>Processing, please wait...</h4>
            <img src="{{ asset('img/loading.gif') }}" alt="Loading..." class="loading-gif">
        </div>
    </div>
</div>

@include('dashboard.footer')

<style>
    .loading-screen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        /* Semi-transparent background */
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .loading-content {
        text-align: center;
        color: #fff;
        /* White text for visibility */
    }

    .loading-gif {
        width: 80px;
        height: 80px;
        max-width: 100%;
        animation: spin 2s linear infinite;
        /* Optional: Add a spin animation */
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @media (max-width: 768px) {
        .loading-gif {
            width: 60px;
            height: 60px;
        }

        .loading-content h4 {
            font-size: 18px;
        }
    }

    @media (max-width: 480px) {
        .loading-gif {
            width: 50px;
            height: 50px;
        }

        .loading-content h4 {
            font-size: 16px;
        }
    }
</style>

<script>
    setTimeout(function() {
        window.location.href = "/user/transaction-successful"; // Redirect to the next step
    }, 1000); // 10 microseconds
</script>