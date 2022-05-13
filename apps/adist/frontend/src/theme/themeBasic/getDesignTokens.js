const font = "'Poppins', sans-serif";

export const getDesignTokens = (mode) => ({
  palette: {
    mode,
    ...(mode === 'light'
      ? {
          // palette values for light mode
          primary: {
            main: '#0058FF',
            light: '#6c84ff',
            dark: '#0030cb'
          },
          secondary: {
            main: '#57b9ff',
            light: '#91ebff',
            dark: '#0089cc'
          },
          background: {
            default: '#F4F7FC'
          }
        }
      : {
          // palette values for dark mode
        })
  },
  typography: {
    fontFamily: font
  }
});
