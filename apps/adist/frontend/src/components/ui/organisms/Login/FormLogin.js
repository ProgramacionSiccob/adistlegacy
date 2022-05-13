import React from 'react';
import {
  Grid,
  LinearProgress,
  Avatar,
  Typography,
  TextField,
  Box,
  Alert,
  Button,
  Link,
  Divider
} from '@mui/material';
import LockOutlinedIcon from '@mui/icons-material/LockOutlined';
import Copyright from '../../atoms/Copyright';
import { CircularLoading } from '../../atoms/loadings/CircularLoading';

function FormLogin() {
  const loading = false;
  const msgError = '';

  return (
    <>
      {loading && (
        <Grid container>
          <Grid xs item>
            <LinearProgress />
          </Grid>
        </Grid>
      )}
      <Box
        sx={{
          my: 8,
          mx: 8,
          display: 'flex',
          flexDirection: 'column',
          alignItems: 'center'
        }}
      >
        <Avatar sx={{ m: 1, bgcolor: 'primary.main' }}>
          <LockOutlinedIcon />
        </Avatar>
        <Typography component="h2">A D I S T</Typography>
        <Typography variant="body2" color="text.disabled">
          Adiministrador integral de servicios tecnologicos
        </Typography>
        <Box component="form" noValidate sx={{ mt: 1 }}>
          <TextField
            margin="normal"
            required
            fullWidth
            id="email"
            label="Usuario"
            name="email"
            autoComplete="email"
            autoFocus
          />
          <TextField
            margin="normal"
            required
            fullWidth
            name="password"
            label="Password"
            type="password"
            id="password"
            autoComplete="current-password"
          />
          {loading && (
            <Box display="flex" mt={2} justifyContent="center">
              <CircularLoading color="primary" />
            </Box>
          )}
          {msgError && (
            <Box mt={2}>
              <Alert severity="error">{msgError}</Alert>
            </Box>
          )}
          <Button type="submit" fullWidth variant="contained" sx={{ mt: 3, mb: 2 }}>
            Iniciar sesión
          </Button>

          <Divider sx={{ mt: 2 }}>
            <Typography variant="body2" color="textPrimary" align="center">
              <Link href="#" variant="body2">
                ¿Olvidaste tu contraseña?
              </Link>
            </Typography>
          </Divider>
          <Box sx={{ mt: 5 }} display="flex" justifyContent="center" alignItems="center">
            <Copyright
              align="center"
              name="Siccob Solutions"
              url="https://siccobsolutions.com.mx"
            />
          </Box>
        </Box>
      </Box>
    </>
  );
}

export default FormLogin;
