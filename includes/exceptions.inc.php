<?php
/**
 * exceptions.inc.php
 *
 * Custom Exception definitions
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    LibreNMS
 * @link       http://librenms.org
 * @copyright  2016 Tony Murray
 * @author     Tony Murray <murraytony@gmail.com>
 */


// ---- addHost Excpetions ----
class HostExistsException extends Exception {}

class HostIpExistsException extends HostExistsException {}

class InvalidPortAssocModeException extends Exception {}

class SnmpVersionUnsupportedException extends Exception {}

class HostUnreachableException extends Exception
{
    protected $reasons = array();

    public function __toString()
    {
        $string = __CLASS__ . ": [{$this->code}]: {$this->message}\n";
        foreach ($this->reasons as $reason) {
            $string .= "  $reason\n";
        }
        return $string;
    }

    /**
     * Add additional reasons
     * @param $message
     */
    public function addReason($message)
    {
        $this->reasons[] = $message;
    }

    /**
     * Get the reasons
     * @return array
     */
    public function getReasons()
    {
        return $this->reasons;
    }
}

class HostUnreachablePingException extends HostUnreachableException {}

class HostUnreachableSnmpException extends HostUnreachableException {}