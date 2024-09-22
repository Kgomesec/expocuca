import qrcode

# URL do site com a imagem como parâmetro
image_url = "http://192.168.0.102:8081/assets/?unstable_path=.%2Fassets%2Fimages%2F931-3000x2000.jpg&platform=web&hash=addcad261a7d6c04237a9a2446a32eb6"  # Substitua por seu caminho de imagem real
site_url = f"http://192.168.0.102:8081/?image={image_url}"  # A URL do site com o parâmetro de imagem

# Gerar o QR Code com a URL completa
qr = qrcode.QRCode(
    version=1,              
    error_correction=qrcode.constants.ERROR_CORRECT_L,
    box_size=10,
    border=4,
)
qr.add_data(site_url)
qr.make(fit=True)

# Criar a imagem do QR Code
qr_code_img = qr.make_image(fill_color="black", back_color="white")
qr_code_img.save("qrcode_image_link2.png")

print("QR Code gerado com sucesso e salvo como 'qrcode_image_link.png'")