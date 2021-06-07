/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   get_next_line.c                                    :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan              +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/04/23 14:13:22 by jeagan            #+#    #+#             */
/*   Updated: 2019/06/08 01:00:58 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "get_next_line.h"

int			get_next_line(const int fd, char **line)
{
	static char	*stock;
	int			i;
	int			ret;
	char		temp[BUFF_SIZE + 1];
	char		*leaks;

	if ((i = 0) || fd < 0 || fd >= OPEN_MAX || !line || BUFF_SIZE < 0
		|| read(fd, temp, 0) || !(stock = stock ? stock : ft_strnew(0)))
		return (-1);
	while (!ft_strchr(stock, '\n') && (ret = read(fd, temp, BUFF_SIZE)) > 0)
	{
		temp[ret] = '\0';
		if (!(leaks = ft_strjoin(stock, temp)))
			return (-1);
		free(stock);
		stock = leaks;
	}
	while (stock[i] && stock[i] != '\n')
		++i;
	*line = stock;
	if (!(stock = ft_strdup(stock[i] ? stock + i + 1 : stock + i)))
		return (-1);
	ret = (*line)[i] == '\n' ? 1 : 0;
	(*line)[i] = '\0';
	return (ret || i);
}
