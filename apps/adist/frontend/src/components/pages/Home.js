import React from 'react';
import { Box, Button, Grid, Typography } from '@mui/material';
import DesktopMacIcon from '@mui/icons-material/DesktopMac';
import { useNavigate } from 'react-router-dom';
import Page from '../common/page/Page';

function Home() {
  const navigate = useNavigate();
  return (
    <Page title="Siccob Solutions">
      <Grid
        container
        spacing={0}
        component="main"
        sx={{ height: '100vh' }}
        className="animate__animated animate__fadeIn"
      >
        <Grid item xs={12} md={6} sx={{ height: '100vh' }} alignItems="center" justify="center">
          <Box
            sx={{
              minHeight: '100vh',
              display: 'flex',
              flexDirection: 'column',
              alignItems: 'center',
              alignContent: 'center',
              justifyContent: 'center'
            }}
            className="animate__animated animate__bounceInLeft"
          >
            <DesktopMacIcon sx={{ fontSize: '5em' }} color="action" />
            <Typography component="h1" variant="h2" className="title-page" sx={{ mt: 2 }}>
              A D I S T
            </Typography>
            <Typography variant="caption" color="text.secondary">
              Adiministrador integral de servicios tecnologicos
            </Typography>
            <Typography variant="body1" color="text.disabled" sx={{ mt: 2, mb: 3 }}>
              Inicia sesión en nuestro sistema.
            </Typography>

            <Button
              type="submit"
              sx={{ padding: '12px 45px' }}
              variant="contained"
              onClick={() => navigate('/sign-in')}
            >
              ENTRAR
            </Button>
          </Box>
        </Grid>
        <Grid
          item
          xs={12}
          md={6}
          sx={{
            background: 'linear-gradient(to right, #0C3778, #2D353C)',
            backgroundRepeat: 'no-repeat',
            backgroundSize: 'cover',
            backgroundPosition: '0 0',
            height: '100vh'
          }}
          alignItems="center"
          justify="center"
        >
          <Box
            className="animate__animated animate__bounceInRight"
            sx={{
              minHeight: '100vh',
              display: 'flex',
              flexDirection: 'column',
              alignItems: 'center',
              alignContent: 'center',
              justifyContent: 'center'
            }}
          >
            <img src="/assets/img/logo-siccob-blanco.png" style={{ width: '7rem' }} alt="SICCOB" />
            <Typography component="h1" variant="h2" color="white" sx={{ mt: 2 }}>
              Siccob Solutions
            </Typography>
            <Typography color="white" variant="caption">
              Soluciones Integrales para Empresas Integrales
            </Typography>
            <Typography color="white" variant="body1" sx={{ mt: 2, mb: 3 }}>
              Conoce nuestros servicios.
            </Typography>
            <Button
              type="submit"
              sx={{ padding: '12px 45px' }}
              variant="outlined"
              onClick={() => (window.location.href = 'https://siccob.com.mx/')}
            >
              ENTRAR
            </Button>
          </Box>
        </Grid>
      </Grid>
    </Page>
  );
}

export default Home;
