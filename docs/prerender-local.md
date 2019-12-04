---
title: Prerender Local
section: Renderers
weight: 200
featherIcon: activity
---

[Prerender](https://prerender.io/) provides an open-source server which could be run locally for **free**.

## Installing and configuring the renderer

```bash
npm install prerender
```

```bash
node node_modules/prerender/server.js
```

The default port is `3000`. Change the server port with `export PORT=3005` if needed.

## Configuring your application

All you have to do on the application side is to put these variables into the `.env` file.

```
DYNAMIC_RENDERER_DRIVER=prerender_local
PRERENDER_LOCAL_SERVICE_URL=http://localhost:3000
```
