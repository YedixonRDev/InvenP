function urlDir(url) {
    if (url === null) {
      window.history.back();
    } else {
      window.location.href = url;
    }
}