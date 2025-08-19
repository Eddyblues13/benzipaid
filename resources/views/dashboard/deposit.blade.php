<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit Funds</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="SHORTCUT ICON" href="https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Bitcoin.svg/1200px-Bitcoin.svg.png">
    <style>
        .container { max-width: 500px; margin-top: 50px; }
        .wallet-address { font-weight: bold; color: green; }
        body { background-color: #001322; }
        #qrCode { margin: 10px auto; display: block; }
        .steps { color: white; margin: 20px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center" style="color:white;">Deposit Funds</h2>

        <ul class="steps">
            <li>The minimum deposit is $50.</li>
            <li>Select your preferred payment gateway.</li>
            <li>Send the deposit to the provided wallet address.</li>
            <li>You will be automatically redirected to the dashboard once the payment is successfully processed.</li>
        </ul>

        <form id="depositForm" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label style="color:white;" class="form-label">Select Payment Gateway :</label>
                <select name="wallet_type" id="walletSelect" class="form-control" required>
                    <option value="">Payment Gateway</option>
                    <option value="Bitcoin" selected>Bitcoin</option>
                    <option value="Ethereum">Ethereum</option>
                    <option value="Solana">Solana</option>
                    <option value="Ton">TON</option>
                    <option value="USDC">USDC</option>
                    <option value="USDT_ERC20">USDT</option>
                    <option value="USDT">USDT (TRC20)</option>
                </select>
            </div>

            <div class="info-card" id="content"></div>

        </form>

<div style="text-align: center;"><b style="display: block;margin-top: 50px;font-size: 25px;color: white;">Payment We Accept: </b>
<br>
<img id="logo" height="60" width="60" src="https://cryptologos.cc/logos/thumbs/bitcoin.png?v=032">
<img id="logo" height="60" width="60" src="https://cryptologos.cc/logos/ethereum-eth-logo.png?v=032">
<img id="logo" height="60" width="60" src="https://cryptologos.cc/logos/solana-sol-logo.png?v=032">
<img id="logo" height="60" width="60" src="https://cryptologos.cc/logos/toncoin-ton-logo.png?v=032">
<img id="logo" height="60" width="60" src="https://cryptologos.cc/logos/tether-usdt-logo.png?v=032">
<br>
<br>

</div>
    </div>
<br><br>            <center><button onclick="cancel()" type="submit" class="btn btn-danger ">Back to Dashboard</button></center>

<script>
    const selectElement = document.getElementById('walletSelect');
    const contentDiv = document.getElementById('content');


    function updateContent(selectedValue) {
        contentDiv.style.display = "block";

        switch (selectedValue) {
            case 'Bitcoin':
                contentDiv.innerHTML = `
            <div class="mb-3">
                <label style="color:white;" class="form-label">Please make deposit into this Bitcoin Wallet Address:</label><br>
                <label style="text-align:center;color:white;" class="form-label">Scan the QR code or copy the address to proceed with your payment:</label>

                <center>
                    <img src="https://www.bitcoinqrcodemaker.com/api/?style=bitcoin&address=bc1qx26fr7hn29thxtvumdrh0u5r3l9y0vdu2xg9k5" alt="QR Code" style="max-width: 200px; margin-bottom: 10px;"><br>
                    <span id="walletAddress" class="wallet-address">bc1qx26fr7hn29thxtvumdrh0u5r3l9y0vdu2xg9k5</span><br>
                    <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="copyToClipboard('bc1qx26fr7hn29thxtvumdrh0u5r3l9y0vdu2xg9k5')">Copy Address</button>
                </center>
            </div>

                `;
                break;

            case 'Ethereum':
                contentDiv.innerHTML = `

            <div class="mb-3">
                <label style="color:white;" class="form-label">Please make deposit into this Ethereum Wallet Address:</label><br>
                <label style="text-align:center;color:white;" class="form-label">Scan the QR code or copy the address to proceed with your payment:</label>

                <center>
                    <img src="https://www.bitcoinqrcodemaker.com/api/?style=ethereum&address=0xbf4e411aeff41da47ca797ca01bafb4c4c012219" alt="QR Code" style="max-width: 200px; margin-bottom: 10px;"><br>
                    <span id="walletAddress" class="wallet-address">0xbf4e411aeff41da47ca797ca01bafb4c4c012219</span><br>
                    <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="copyToClipboard('0xbf4e411aeff41da47ca797ca01bafb4c4c012219')">Copy Address</button>
                </center>
            </div>
                `;
                break;
            case 'Solana':
                contentDiv.innerHTML = `

            <div class="mb-3">
                <label style="color:white;" class="form-label">Please make deposit into this Solana Wallet Address:</label><br>
                <label style="text-align:center;color:white;" class="form-label">Scan the QR code or copy the address to proceed with your payment:</label>

                <center>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?data=HvDfNdCzXghJEewZuhXT9hgTNHwe79Lo9EUhrnFV7g3T" alt="QR Code" style="max-width: 200px; margin-bottom: 10px;"><br>
                    <span id="walletAddress" class="wallet-address">HvDfNdCzXghJEewZuhXT9hgTNHwe79Lo9EUhrnFV7g3T</span><br>
                    <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="copyToClipboard('HvDfNdCzXghJEewZuhXT9hgTNHwe79Lo9EUhrnFV7g3T')">Copy Address</button>
                </center>
            </div>
                `;
                break;
            case 'Ton':
                contentDiv.innerHTML = `

            <div class="mb-3">
                <label style="color:white;" class="form-label">Please make deposit into this TON Wallet Address:</label><br>
                <label style="text-align:center;color:white;" class="form-label">Scan the QR code or copy the address to proceed with your payment:</label>

                <center>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?data=UQA9AVP88r-w9zXhd6DttDCh8O5usVBZMwbKPewu-RJ0-rvB" alt="QR Code" style="max-width: 200px; margin-bottom: 10px;"><br>
                    <span id="walletAddress" class="wallet-address">UQA9AVP88r-w9zXhd6DttDCh8O5usVBZMwbKPewu-RJ0-rvB</span><br>
                    <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="copyToClipboard('UQA9AVP88r-w9zXhd6DttDCh8O5usVBZMwbKPewu-RJ0-rvB')">Copy Address</button>
                </center>
            </div>
                `;
                break;

            case 'USDC':
                contentDiv.innerHTML = `

            <div class="mb-3">
                <label style="color:white;" class="form-label">Please make deposit into this USDC Wallet Address:</label><br>
                <label style="text-align:center;color:white;" class="form-label">Scan the QR code or copy the address to proceed with your payment:</label>

                <center>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?data=0xbf4e411aeff41da47ca797ca01bafb4c4c012219" alt="QR Code" style="max-width: 200px; margin-bottom: 10px;"><br>
                    <span id="walletAddress" class="wallet-address">0xbf4e411aeff41da47ca797ca01bafb4c4c012219</span><br>
                    <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="copyToClipboard('0xbf4e411aeff41da47ca797ca01bafb4c4c012219')">Copy Address</button>
                </center>
            </div>

                `;
                break;

            case 'USDT':
                contentDiv.innerHTML = `
            <div class="mb-3">
                <label style="color:white;" class="form-label">Please make deposit into this USDT-TRC20 Wallet Address:</label><br>
                <label style="text-align:center;color:white;" class="form-label">Scan the QR code or copy the address to proceed with your payment:</label>

                <center>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?data=TGgzhg26iVxr1njtLKKTLauqsKpbCVPDWe" alt="QR Code" style="max-width: 200px; margin-bottom: 10px;"><br>
                    <span id="walletAddress" class="wallet-address">TGgzhg26iVxr1njtLKKTLauqsKpbCVPDWe</span><br>
                    <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="copyToClipboard('TGgzhg26iVxr1njtLKKTLauqsKpbCVPDWe')">Copy Address</button>
                </center>
            </div>
                `;
                break;

            case 'USDT_ERC20':
                contentDiv.innerHTML = `

            <div class="mb-3">
                <label style="color:white;" class="form-label">Please make deposit into this USDT Wallet Address:</label><br>
				<div><i><font size="2" color="red">*Note : you can send your deposit with any of EVM network (ERC20, BSC, MATIC, AVAX-C, etc)</font></i></div>
                <label style="text-align:center;color:white;" class="form-label">Scan the QR code or copy the address to proceed with your payment:</label>

                <center>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?data=0xbf4e411aeff41da47ca797ca01bafb4c4c012219" alt="QR Code" style="max-width: 200px; margin-bottom: 10px;"><br>
                    <span id="walletAddress" class="wallet-address">0xbf4e411aeff41da47ca797ca01bafb4c4c012219</span><br>
                    <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="copyToClipboard('0xbf4e411aeff41da47ca797ca01bafb4c4c012219')">Copy Address</button>
                </center>
            </div>

                `;
                break;

            default:
                contentDiv.style.display = "none";
                break;
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const selectedValue = selectElement.value || 'Bitcoin'; 
        updateContent(selectedValue);
    });

    selectElement.addEventListener('change', function () {
        updateContent(this.value);
    });


        function copyToClipboard(walletAddress) {
            navigator.clipboard.writeText(walletAddress).then(() => {
                alert("Address copied to clipboard!");
            }).catch(err => {
                console.error("Could not copy text: ", err);
            });
        }


        function cancel() {
            window.history.go(-1);
        }

    </script>
</body>
</html>
