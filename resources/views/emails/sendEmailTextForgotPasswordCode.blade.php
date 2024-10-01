Prezado(a) {{$user->name}}

Para recuperar a sua senha do app, use o código de verificação abaixo:

{{ $code }}

Por questões de segurança esse código é válido somente até as {{ $formattedTime }} do dia {{ $formattedDate }}. Caso esse prazo esteja expirado, será necessário solicitar outro código.

Atenciosamente,

Celke