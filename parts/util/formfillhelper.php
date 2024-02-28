<button type="button" id="fillForm">copyright</button>
                    <script>
                    document.getElementById('fillForm').addEventListener('click', function() {
                        $('#clientName').val('Massage Client ');
                        $('#clientEmail').val('massage.client.test@colina.net');
                        $('#clientNumber').val('1234567890');
                        $('#serviceLocation').val('Samplecity');
                    });
                    </script>