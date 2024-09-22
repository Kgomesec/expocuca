import qrcode

image_local_url = "http://192.168.0.102:8081/assets/?unstable_path=.%2Fassets%2Fimages%2F931-3000x2000.jpg&platform=web&hash=addcad261a7d6c04237a9a2446a32eb6"

qr = qrcode.QRCode(
    version=1,
    error_correction=qrcode.constants.ERROR_CORRECT_L,
    box_size=10,
    border=4,
)
qr.add_data(image_local_url)
qr.make(fit=True)

qr_code_img = qr.make_image(fill_color="black", back_color="white")
qr_code_img.save("qrcode_local_image_link.png")

print("QR Code gerado com sucesso e salvo como 'qrcode_local_image_link.png'")
