# Checkpoint — Migração do projeto para o WSL

> Este arquivo é a **fonte de verdade** do progresso. Se a sessão acabar,
> a próxima sessão lê daqui e retoma do próximo passo pendente.

## Contexto

- Origem: `D:\Codigos-Independentes\Meu\Laravel\Teste-1\myapp` (Windows / DrvFS)
- Destino: `~/Codigos-Independentes/Meu/Laravel/Teste-1/myapp` (WSL Ubuntu / ext4)
- Problema: `touch(): Utime failed: Operation not permitted` em `localhost/users`
- Causa: bind mount cruzando Windows (NTFS/DrvFS) → container Docker, NTFS não
  permite `utimensat()` a partir do Linux. Blade compiler tenta `touch()` em
  `storage/framework/views/*.php` e falha.
- Solução escolhida: **Opção A** (mover o código para o ext4 nativo do WSL).
- User é `root` no WSL. /mnt/d está montado e legível.
- Sem `.git/` na origem — projeto não é repo, é só pasta. Vamos copiar.

## Estado das tarefas

- [x] #6 — Verificar ambiente WSL e dependências
- [ ] #1 — Criar estrutura de pastas no WSL
- [ ] #2 — Copiar projeto para WSL pulando lixo
- [ ] #3 — Reinstalar dependências no WSL
- [ ] #4 — Subir Sail e validar a rota /users
- [ ] #5 — Configurar VSCode para abrir o projeto do WSL

## Passos executados (append-only, manter ordem)

(nenhum ainda)

## Decisões

- **Exclusões na cópia**: `vendor/`, `node_modules/`, `.git/`,
  `storage/logs/*.log`, `storage/framework/cache/data/*`,
  `storage/framework/sessions/*`, `storage/framework/views/*`.
  (Mantemos `storage/framework/{cache,sessions,views}/` como pastas vazias —
  Sail precisa delas; basta não copiar o conteúdo.)
- **Composer e npm rodam no WSL**, não no Windows. DrvFS é lento pra
  milhares de arquivos.
- **Sail como binário do WSL** (mais limpo que `vendor/bin/sail`).

## Comandos para retomar (se esta sessão acabar)

```bash
wsl.exe -d Ubuntu -- bash -c 'cat ~/Codigos-Independentes/Meu/Laravel/Teste-1/myapp/CHECKPOINT.md'
```

A próxima sessão lê o bloco "Passos executados", compara com "Estado das
tarefas" e continua do próximo checkbox `[ ]`.

## Pendências abertas

- Instalar `php-cli`, `composer`, `docker.io` (ou via Docker Desktop) e
  Sail no WSL.
- Confirmar que o daemon Docker está acessível do WSL
  (Docker Desktop expõe `/var/run/docker.sock` no WSL — basta o cliente
  Docker estar instalado; o daemon é o do Windows).
