import { createTheme } from '@mui/material/styles';

export const theme = createTheme({
  palette: {
    mode: 'dark',
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
      paper: '#F4F7FC',
      default: '#FFF'
    }
  }
});
