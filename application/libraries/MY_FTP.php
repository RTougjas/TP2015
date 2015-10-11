<?php

class MY_FTP extends CI_FTP { //Assuming that in your config.php file, your subclass prefix is set to 'MY_' like so: $config['subclass_prefix'] = 'MY_';

    var $timeout = 90;
    /**
     * FTP Connect
     *
     * @access  public
     * @param   array    the connection values
     * @return  bool
     */
    function connect($config = array())
    {
        if (count($config) > 0)
        {
            $this->initialize($config);
        }

        if (FALSE === ($this->conn_id = ftp_connect($this->hostname, $this->port, $this->timeout)))
        {
            if ($this->debug == TRUE)
            {
                $this->_error('ftp_unable_to_connect');
            }
            return FALSE;
        }

        if ( ! $this->_login())
        {
            if ($this->debug == TRUE)
            {
                $this->_error('ftp_unable_to_login');
            }
            return FALSE;
        }

        // Set passive mode if needed
        if ($this->passive == TRUE)
        {
            ftp_pasv($this->conn_id, TRUE);
        }

        return TRUE;
    }
    
    /**
     * This function overrides 
     */
    function _error($line)
    {
        $this->error = $line;
    }
}
?>